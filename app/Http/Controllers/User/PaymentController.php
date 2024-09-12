<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Exception;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();

        $selectedBooks = json_decode($request->input('selected_books'), true);
      


        $cartItems = Cart::where('user_id', $userId)
            ->whereIn('book_id', $selectedBooks)
            ->with('book') 
            ->get();

     

        $totalPrice = $this->calculateTotalPrice($cartItems);

        $totalDiscountAmount = $cartItems->sum(function ($item) {
            return $item->book->getDiscountAmountAttribute() * $item->quantity;
        });

        $totalDiscountedPrice = $cartItems->sum(function ($item) {
            return $item->book->discounted_price * $item->quantity;
        });
        $totalBooks = $cartItems->pluck('book_id')->unique()->count();

        return view('user.payment.payment', [
            'selectedBooks' => $selectedBooks,
            'cartItems' => $cartItems,
            'totalPrice' => $totalPrice,
            'totalBooks' => $totalBooks,
            'totalDiscountAmount' => $totalDiscountAmount,
            'totalDiscountedPrice' => $totalDiscountedPrice,
        ]);
    }


    private function calculateTotalPrice($cartItems)
    {
        $totalPrice = 0;

        foreach ($cartItems as $item) {
            if (isset($item->book->price) && isset($item->quantity)) {
                $totalPrice += $item->book->price * $item->quantity;
            }
        }

        return $totalPrice;
    }



   
}
