<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItems;
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
        
        // Create a new order
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
    
                // Calculate price considering discount
                $price = $book->discount > 0 ? $book->price - ($book->price * ($book->discount / 100)) : $book->price;
                $totalAmount += $price * $quantity;
    
                // Create order items
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
            $order->status =3;
            $order->save();

            return redirect()->route('user.payment.failed' ,['id' => $id] );
        }
    }
   
} 
