<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShippingController extends Controller
{
    public function show(Request $request){
        $userId = Auth::id();

        $selectedBooks = json_decode($request->input('selected_books'), true);
  
        
        $item = cart::where('user_id', $userId)->whereIn('book_id', $selectedBooks)->with('book')->get();
    
        $totalPrice = $this->calculateTotalPrice($item);
        $totalDiscountAmount = $item->sum(function ($item) {
         return $item->book->getDiscountAmountAttribute() * $item->quantity;
         });
         $totalDiscountedPrice = $item->sum(function ($item) {
            return $item->book->discounted_price * $item->quantity;
        });
        
        $totalBooks = $item->pluck('book_id')->unique()->count();

        return view('user.payment.shipping', [
            'item'=>$item,
            'totalPrice' => $totalPrice,
            'totalBooks' => $totalBooks,
            'totalDiscountAmount' => $totalDiscountAmount,
            'totalDiscountedPrice' => $totalDiscountedPrice,
        ]);
    }
    private function calculateTotalPrice($item)
    {
        $totalPrice = 0;
        foreach ($item as $items) {
            if (isset($items['book']->price) && isset($items['quantity'])) {
                $totalPrice += $items['book']->price * $items['quantity'];
            }
        }
        
        return $totalPrice;
    }
}
