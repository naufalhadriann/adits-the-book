<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Contracts\View\View;

class PaymentController extends Controller
{
 
    public function paymentPage($id){
        $authId = Auth::id();
       $orders = Order::where('id', $id)->where('user_id', $authId)->where('status', 1)->with('orderItems.book')->get();

   

    if ($orders->isNotEmpty()) {
        $totalPrice = $orders->sum(function ($order) {
            return $order->orderItems->sum(function ($item) {
                return $item->price * $item->quantity;
            });
        });

        $totalDiscountAmount = $orders->sum(function ($order) {
            return $order->orderItems->sum(function ($item) {
                return $item->book ? $item->book->getDiscountAmountAttribute() * $item->quantity : 0;
            });
        });

        $totalDiscountedPrice = $orders->sum(function ($order) {
            return $order->orderItems->sum(function ($item) {
                return $item->book ? $item->book->discounted_price * $item->quantity : 0;
            });
        });
    }
        
        return view('user.payment.payment',[
            'orders' => $orders, 
                'totalPrice' => $totalPrice,
                'totalDiscountAmount' => $totalDiscountAmount,
                'totalDiscountedPrice' => $totalDiscountedPrice,
        ]);
    }

    public function expireOrder($id){
        $authId = Auth::id();

        $order = Order::where('id', $id)->where('user_id', $authId)->first();

        if($order){
            $order->status = 3;
            $order->save();

        }
        $orderFailed = Order::where('id', $id)->where('user_id', $authId)->first();

        return view('user.payment.failed', compact('order'));
    }
    public function failedOrder()
    {
        $userId = Auth::id();
        
        $order = Order::where('user_id', $userId)->first();

        return view('user.payment.failed', compact('order'));
    }
    public function cancelOrder($id){
        $authId = Auth::id();

        $order = Order::where('id', $id)->where('user_id', $authId)->first();
        if($order){
            $order->status = 3;
            $order->save();
        }
       

        return redirect()->back()->with('message', 'berhasil batalkan order');
    }
   
    public function payment(Request $request,  $id) {
        $authId = Auth::id();
        
        $order = Order::where('id', $id)->where('user_id', $authId)->first();
         Transaction::create([
            'order_id' => $order->id,  
            'amount' => $order->total_amount,
            'payment_method' => $order->payment_method,
            
        ]);
        $order->status = 2;
        $order->save();

        foreach($order->orderItems as  $item){
            $book = Book::find($item->book_id);
            if($book){
                $book->stock -= $item->quantity;
                $book->save();
            }
        }
        $transaction = Transaction::where('order_id', $id)->first();


       
    
        return view('user.payment.success', compact('transaction'));
    }
    
    
} 
