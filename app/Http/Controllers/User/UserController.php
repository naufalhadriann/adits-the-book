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
    
        return view("user.dashboard", compact("books","categorys"));    }
}
