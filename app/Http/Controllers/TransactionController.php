<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
       $transactions = transaction::all();
        return view("admin.transaction.transaction", compact("transactions"));
    }
}
