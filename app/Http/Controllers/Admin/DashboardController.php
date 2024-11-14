<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Book;
use App\Models\Category;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function index(){

        $totalUser = user::where('role', 0)->count();
        $totalBook = Book::count();
        $totalCategory = Category::count();
        $totalOrder = Order::whereIn('status',[1,2])->count();
        $summaryTransaction = Transaction::sum('amount');
        $totalTransaction = Order::where('status', 2)->count();
        
     if($summaryTransaction >= 1000000000 ){
            $formattedTransaction =  number_format($summaryTransaction / 1000000000, 1 ,',','.'). ' Miliar';
        }elseif ($summaryTransaction >= 1000000) {
            $formattedTransaction = number_format($summaryTransaction / 1000000, 1, ',', '.') . ' Juta'; 
        } elseif ($summaryTransaction >= 1000) {
            $formattedTransaction = number_format($summaryTransaction / 1000, 1, ',', '.') . ' Ribu'; 
        } else {
            $formattedTransaction = number_format($summaryTransaction, 0, ',', '.'); 
        }
        
        $totalAdmin = User::where('role',1)->count();

        return view("admin.dashboard",compact('totalUser','totalBook','totalCategory','totalAdmin','totalOrder','totalTransaction','formattedTransaction','summaryTransaction')) ;
    }
    
        
    
}
