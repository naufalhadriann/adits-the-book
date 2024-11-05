<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionController extends Controller
{
    public function index()
    {
     $transactions = Transaction::with('order.orderItems')->get(); 
     
        return view("admin.transaction.transaction", compact('transactions'));
    }
}
