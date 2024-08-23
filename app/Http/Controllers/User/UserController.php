<?php

namespace App\Http\Controllers\User;

use App\Models\Book;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $books = Book::all();
        $categorys = Category::all();
    
        return view("user.dashboard", compact("books","categorys"));   
     }
     public function search(Request $request){
        $query = $request->input('query');
        $search = Book::get();
        if($query){
            $search = Book::where('title','like', "%{$query}%")
            ->orWhere('author', 'like', "%{$query}%")
            ->orWhereHas('category', function ($querys) use ($query){
                $querys->where('genre', 'like', "%{$query}%")->orWhere('name', 'like', "%{$query}%");
            });
            $totalBooks = $search->count();

            $books = $search->orderBy('id')->paginate(12);
            $books->appends(['query' => $query]);
            return view ('user.search.search', compact("books","query","search","totalBooks"));
        }

     }
    
}

