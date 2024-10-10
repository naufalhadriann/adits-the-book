<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\address;
use App\Models\cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ShippingController extends Controller
{
    public function show(Request $request)
    {
        
        $userId = Auth::id();
        $user = Auth::user();

        if (!$user->hasAddress()) {
            Alert::toast('Kamu Belum Mencatumkan Alamat', 'error');
             return redirect()->back()->with('failed');
        }

        $selectedBooks = json_decode($request->input('selected_books'), true);
  
        
        $item = cart::where('user_id', $userId)->whereIn('book_id', $selectedBooks)->with('book')->get();
        $address = address::where('user_id', $userId)->first();
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
            'address' => $address,
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
