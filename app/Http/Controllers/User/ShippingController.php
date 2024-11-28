<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\address;
use App\Models\Book;
use App\Models\cart;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

use function PHPUnit\Framework\isEmpty;

class ShippingController extends Controller
{
    public function show(Request $request)
    {
        
        $userId = Auth::id();
        $user = Auth::user();

        if (!$user->hasAddress()) {
            Alert::toast('Silahkan <a href="'.route('user.address').'" class="text-primary">tambahkan alamatmu</a> untuk melanjutkan', 'error');
            return redirect()->back()->with('error');
        }

        $selectedBooks = json_decode($request->input('selected_books'), true);
        
        $item = cart::where('user_id', $userId)->whereIn('book_id', $selectedBooks)->with('book')->get();
        if($item->isEmpty()){
            $item = collect();
        }
        $address = address::where('user_id', $userId)->where('status', 1)->first();
        $addresses = address::where('user_id', $userId)->get();
        if($addresses->isEmpty()){
            $addresses = collect();
        }
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
            'addresses' => $addresses,
            'selected_books' => $selectedBooks,
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
    public function checkout(Request $request){
        $userId = Auth::id();
        $userAddress = Address::where('user_id', $userId)->where('status', 1)->first();  

        $selectedBooks = json_decode( $request->input('selected_books'),true);
        $order = Order::create([
            'user_id' => $userId,
            'total_amount' => 0,
            'payment_method' => $request->input('payment_method'),
            'address_id' => $userAddress->id,
            'status' => 1,
        ]);
        
        $totalAmount = 0;
    
        foreach ($selectedBooks as $bookData) {
            $book = Book::find($bookData['book_id']);
            
            if ($book) {
                $quantity = $bookData['quantity'];
                $price = $book->price; 
                $discount = $book->discount;

                if($book->hasDiscount()){
                    $discountedPrice = ($price * (1 - ($discount / 100))) * $quantity;
                    $totalAmount += $discountedPrice;
                }else{
                    $totalAmount += $price * $quantity;

                }
                
    
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
        
        $this->removeBooksFromCart($userId, $selectedBooks);


        return redirect()->route('payment.page' , $order->id);
    }
    private function removeBooksFromCart($userId, $selectedBooks) {
        foreach ($selectedBooks as $bookData) {
            $bookId = $bookData['book_id'];
            Cart::where('user_id', $userId)->where('book_id', $bookId)->delete();
        }
    }
    
}
