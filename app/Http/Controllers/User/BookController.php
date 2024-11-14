<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\category;
use App\Models\UserBooks;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request){
        $discountId = $request->input('discount_id', [1, 2, 3, 44]); 
        $mangaId = $request->input('manga_id',[61,56,55,32,63,59,70,80]);
        $newId = $request->input('new_id',[68,34,35,17,37,38]);
        $recommendId = $request->input('recommend_id', [33, 19, 4, 15]); 
        $discountBook = Book::whereIn('id', $discountId)->get();
        $recommendBook = Book::whereIn('id', $recommendId)->get();
        $mangaBook = Book::whereIn('id',$mangaId)->get();
        $newBook = Book::orderBy('publish_date','desc')->take(6)->get();
       
        return view('user.dashboard', compact('discountBook', 'recommendBook','mangaBook','newBook'));
    }

    public function show($title){
        $title = urldecode($title);
        $category = category::get();
        
        $book = Book::where('title', $title)->firstOrFail();

        return view('user.product.product', compact('book','category'));
    }

    public function more(Request $request){
        $discountId = $request->input('discount_id', [1, 2, 3, 44, 20, 13, 5, ]); 
        $discountBook = Book::whereIn('id', $discountId)->get();

        return view('user.product.page.diskonpage', compact('discountBook'));
    }
    
    public function load(Request $request){
        $recommendId = $request->input('recommend_id', [33, 19, 4, 15,20,10,15,29,34]); 
        $recommendBook = Book::whereIn('id', $recommendId)->get();

        return view('user.product.page.rekomendpage', compact('recommendBook'));
    }

  
   
    
}
