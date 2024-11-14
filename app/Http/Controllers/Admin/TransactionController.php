<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\OrderItems;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionController extends Controller
{
    public function index()
    {
     $transactions = Transaction::with('order.orderItems.book')->get(); 
     $orderItems = OrderItems::with('book')->get();
   
   
     
        return view("admin.transaction.transaction", compact('transactions','orderItems'));
    }
}
