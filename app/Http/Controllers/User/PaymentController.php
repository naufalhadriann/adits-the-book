<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\UserBooks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index(Request $request){
        $userId = Auth::id();

        $selectedBookIds = $request->input('selected_books', []);

         $cart = UserBooks::where('user_id', $userId)
        ->with('book')
        ->get();
        $totalPrice = $this->calculateTotalPrice($cart);

        $totalDiscountAmount = $cart->sum(function ($item) {
         return $item->book->getDiscountAmountAttribute() * $item->quantity;
         });
         $totalDiscountedPrice = $cart->sum(function ($item) {
            return $item->book->discounted_price * $item->quantity;
        });
        
        $totalBooks = $cart->pluck('book_id')->unique()->count();

        return view('user.payment.payment', [
            'cart' => $cart,
            'totalPrice' => $totalPrice,
            'totalBooks' => $totalBooks,
            'totalDiscountAmount' => $totalDiscountAmount,
            'totalDiscountedPrice' => $totalDiscountedPrice,
        ]);
    }
    private function calculateTotalPrice($cart)
    {
        $totalPrice = 0;

        foreach ($cart as $item) {
            if (isset($item['book']->price) && isset($item['quantity'])) {
                $totalPrice += $item['book']->price * $item['quantity'];
            }
        }
        

        return $totalPrice;
    }
}
