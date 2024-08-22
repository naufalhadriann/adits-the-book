<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\UserBooks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    public function viewCart() {
        $userId = Auth::id();

        $cart = UserBooks::where('user_id', $userId)->with('book')->get();
       
        $totalPrice = $this->calculateTotalPrice($cart);

        $totalValue = $this->calculateTotalValue($cart);

        $totalDiscountAmount = $cart->sum(function ($item) {
         return $item->book->getDiscountAmountAttribute() * $item->quantity;
         });
         $totalDiscountedPrice = $cart->sum(function ($item) {
            return $item->book->discounted_price * $item->quantity;
        });
        
    

        $totalAmount =$totalValue - $totalDiscountAmount  ;
   
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

        $cartItem = userBooks::where('user_id', $userId)->where('book_id', $bookId)->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->status = 1;
            $cartItem->save();
        } else {
            UserBooks::create([
                'user_id' => $userId,
                'book_id' => $bookId,
                'quantity' => $quantity,
                'status' => 1,
            ]);
        }
        Alert::toast('Product Succes add to cart','success');
        return redirect()->back()->with('success', 'Cart updated successfully.');
    }
    public function update(Request $request)
    {
        $userId = Auth::id();
        $bookId = $request->input('book_id');
        $quantity = $request->input('quantity', 1);
    
        $cartItem = UserBooks::where('user_id', $userId)
                              ->where('book_id', $bookId)
                              ->first();
    
        if ($cartItem) {
            if ($quantity > 0) {
                $cartItem->quantity = $quantity;
                $cartItem->status = 1;
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
    
        // Find the cart item for the given user and book
        $cartItem = UserBooks::where('user_id', $userId)
                              ->where('book_id', $bookId)
                              ->first();
    
        if ($cartItem) {
            // Remove the item from the cart
            $cartItem->delete();
            $message = 'Item removed from cart.';
        } else {
            $message = 'Item not found in cart.';
        }
    
        // Redirect back with a success message
        return redirect()->back()->with('success', $message);
    }
    public function removeAll(Request $request)
    {
        $userId = Auth::id();
        $bookIds = $request->input('book_ids', []);
    
        if (!empty($bookIds)) {
            UserBooks::where('user_id', $userId)
                     ->whereIn('book_id', $bookIds)
                     ->delete();
            
            Alert::toast('Selected items removed from cart', 'success');
        } else {
            Alert::toast('No items selected for removal', 'info');
        }
    
        return redirect()->back();
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
