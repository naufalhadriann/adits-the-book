<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $totalUser = user::count();
        $totalBook = Book::count();
        $totalCategory = Category::count();
        $totalAdmin = User::where('role',1)->count();

        return view("admin.dashboard",compact('totalUser','totalBook','totalCategory','totalAdmin')) ;
    }
    
        
    
}
