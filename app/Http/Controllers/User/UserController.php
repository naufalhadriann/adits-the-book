<?php

namespace App\Http\Controllers\User;

use App\Models\Book;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){
        $books = Book::all();
        $categorys = Category::all();
    
        return view("user.dashboard", compact("books","categorys"));   
     }
     public function search(Request $request) {
        $query = $request->input('query');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        $sort = $request->input('sort');
        $categorys = Category::get();
   
        $search = Book::query();
        
        if ($query) {
            $search->where(function($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('author', 'like', "%{$query}%")
                  ->orWhereHas('category', function ($querys) use ($query) {
                      $querys->where('genre', 'like', "%{$query}%")
                             ->orWhere('name', 'like', "%{$query}%");
                  });
            });
        }
    
        if ($minPrice) {
            $search->where('price', '>=', $minPrice)->orderBy('price', 'asc');
        }
    
        if ($maxPrice) {
            $search->where('price', '<=', $maxPrice)->orderBy('price','desc');
        }
    
        $totalBooks = $search->count();
    
        switch($sort){
            case 1:
                $search->orderBy('price', 'asc');
                break;
            case 2:
                $search->orderBy('price', 'desc');
                break;
            case 3:
                $search->orderBy('created_at', 'desc');
                break;
            case 4:
                $search->orderBy('created_at','asc');       
                break;
            default:
            $search->orderBy('id');
            break;
            }
        $books = $search->orderBy('id')->paginate(12);
        $books->appends(['query' => $query, 'min_price' => $minPrice, 'max_price' => $maxPrice, 'sort'=> $sort]);
        return view('user.search.search', compact('books', 'query', 'minPrice', 'maxPrice', 'totalBooks','sort' ,'categorys'));
    }
    
    
}

