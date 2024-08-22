<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\UserBooks;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request){
        $discountId = $request->input('discount_id', [1, 6, 9, 12]); 
        $mangaId = $request->input('manga_id',[30,25,32,7,31,27]);
        $newId = $request->input('new_id',[33,34,35,17,37,38]);
        $recommendId = $request->input('recommend_id', [33, 19, 4, 15]); 
        $discountBook = Book::whereIn('id', $discountId)->get();
        $recommendBook = Book::whereIn('id', $recommendId)->get();
        $newBook = Book::WhereIn('id',$newId)->get();
        $mangaBook = Book::whereIn('id',$mangaId)->get();
       
        return view('user.dashboard', compact('discountBook', 'recommendBook','mangaBook','newBook'));
    }

    public function show($title){
        $title = urldecode($title);

        $book = Book::where('title', $title)->firstOrFail();

        return view('user.product.product', compact('book'));
    }

    public function more(Request $request){
        $discountId = $request->input('discount_id', [1, 6, 9, 12, 18, 16, 22, 20]); 
        $discountBook = Book::whereIn('id', $discountId)->get();

        return view('user.product.page.diskonpage', compact('discountBook'));
    }
    
    public function load(Request $request){
        $recommendId = $request->input('recommend_id', [33, 19, 4, 15,20,10,15,29,34]); 
        $recommendBook = Book::whereIn('id', $recommendId)->get();

        return view('user.product.page.rekomendpage', compact('recommendBook'));
    }

  
   
    
}
