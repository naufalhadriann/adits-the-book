<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    public function viewCart() {
        $userId = Auth::id();

        $cart = cart::where('user_id', $userId)->with('book')->get();
        $totalPrice = $this->calculateTotalPrice($cart);
      
        $totalValue = $this->calculateTotalValue($cart);

        $totalDiscountAmount = $cart->sum(function ($item) {
         return $item->book->getDiscountAmountAttribute() * $item->quantity;
         });
         $totalDiscountedPrice = $cart->sum(function ($item) {
            return $item->book->discounted_price * $item->quantity;
        });
        

        $totalAmount = $totalValue - $totalDiscountAmount  ;
   
        $totalBooks = $cart->pluck('book_id')->unique()->count();

        return view('user.cart.cart', [
            'cart' => $cart,
            'totalPrice' => $totalPrice,
            'totalValue' => $totalValue,
            'totalBooks' => $totalBooks,
            'totalDiscountAmount' => $totalDiscountAmount,
            'totalAmount' =>  $totalAmount,
            'totalDiscountedPrice' => $totalDiscountedPrice,
        ]);
    }
    public function cart(Request $request) {
        $userId = Auth::id();
        $bookId = $request->input('book_id');
        $quantity = $request->input('quantity', 1);

        $cartItem = cart::where('user_id', $userId)->where('book_id', $bookId)->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            cart::create([
                'user_id' => $userId,
                'book_id' => $bookId,
                'quantity' => $quantity,
            ]);
        }
        Alert::toast('Buku berhasil masuk ke cart  <a href="'. route('cart.view').'" class="ms-1">Lihat</a>','success');
        return redirect()->back()->with('success', 'Cart updated successfully.');
    }
    public function update(Request $request)
    {
        $userId = Auth::id();
        $bookId = $request->input('book_id');
        $quantity = $request->input('quantity', 1);
    
        $cartItem = cart::where('user_id', $userId)
                              ->where('book_id', $bookId)
                              ->first();
    
        if ($cartItem) {
            if ($quantity > 0) {
                $cartItem->quantity = $quantity;
                $cartItem->save();
                $message = 'Cart updated successfully.';
            } else {
                $cartItem->delete();
                $message = 'Item removed from cart.';
            }
        } else {
            $message = 'Item not found in cart.';
        }
    
        return redirect()->back()->with('success', $message);
    }

    public function remove(Request $request)
    {
        $userId = Auth::id();
        $bookId = $request->input('book_id');
    
        $cartItem = cart::where('user_id', $userId)
                              ->where('book_id', $bookId)
                              ->first();
    
        if ($cartItem) {

            $cartItem->delete();
            $message = 'Item removed from cart.';
        } else {
            $message = 'Item not found in cart.';
        }
    
        Alert::toast('Buku berhasil dihapus' ,'success');
        return redirect()->back()->with('success', $message);
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
    private function calculateTotalValue($cart)
    {
        $totalPrice = 0;
        $totalQuantity = 0;
    
        foreach ($cart as $item) {
            if (isset($item['book']->price) && isset($item['quantity'])) {
                $totalPrice += $item['book']->price * $item['quantity'];
                $totalQuantity += $item['quantity'];
            }
        }
    
 
        $totalValue = $totalPrice ;
    
        return $totalValue;
    }

   
}
