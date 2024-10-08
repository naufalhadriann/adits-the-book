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

class PaymentController extends Controller
{
    public function proceedToCheckout(Request $request)
    {
        $authId = Auth::id();
        $selectedBooks = json_decode($request->input('selected_books'), true);
        
        $order = Order::create([
            'user_id' => $authId,
            'total_amount' => 0,
            'status' => 1,
        ]);
        
        $totalAmount = 0;
    
        foreach ($selectedBooks as $bookData) {
            $book = Book::find($bookData); 
            if ($book) {
                $quantity = $bookData['quantity'] ?? 1; 
    
                
                $price = $book->discount > 0 ? $book->price - ($book->price * ($book->discount / 100)) : $book->price;
                $totalAmount += $price * $quantity;
    
                OrderItems::create([
                    'order_id' => $order->id,
                    'book_id' => $book->id,
                    'quantity' => $quantity,
                    'price' => $price,
                ]);
            }
        }
    
    
        $order->total_amount = $totalAmount;
        $order->save();
    
    
        Cart::where('user_id', $authId)->whereIn('book_id',$selectedBooks)->delete();
    
       
        return redirect()->route('payment.page', ['id' => $order->id]);
    }
    
    
    
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
        return redirect()->route('user.payment.failed');
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
   
    public function checkout(Request $request,  $id) {
        $authId = Auth::id();
        
        $order = Order::where('id', $id)->where('user_id', $authId)->first();
    
        if (!$order) {
            return redirect()->route('user.orders')->with('error', 'Order not found.');
        }
    
        $transaction = Transaction::create([
            'order_id' => $order->id,  
            'amount' => $order->total_amount,
            'payment_method' => $request->input('paymentOption'),
        ]);
    
        $order->status = 2;
        $order->save();

       
    
        return redirect()->route('user.payment.success', compact('transaction'));
    }
    
} 
