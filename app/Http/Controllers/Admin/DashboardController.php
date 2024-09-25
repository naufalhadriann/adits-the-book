<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Book;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function index(){

        $totalUser = user::count();
        $totalBook = Book::count();
        $totalCategory = Category::count();
        $totalOrder = Order::whereIn('status',[1,2])->count();
        $totalTransaction = Order::where('status', 2)->sum('total_amount');
       
        if ($totalTransaction >= 1000000) {
            $formattedTransaction = number_format($totalTransaction / 1000000, 0, ',', '.') . ' juta';
        } elseif ($totalTransaction >= 1000) {
            $formattedTransaction = number_format($totalTransaction / 1000, 0, ',', '.') . ' ribu';
        } else {
            $formattedTransaction = number_format($totalTransaction, 0, ',', '.');
        }
        $totalAdmin = User::where('role',1)->count();

        return view("admin.dashboard",compact('totalUser','totalBook','totalCategory','totalAdmin','totalOrder','totalTransaction','formattedTransaction')) ;
    }
    
        
    
}
