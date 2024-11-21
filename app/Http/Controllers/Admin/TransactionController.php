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
    public function index(Request $request)
{
    $query = $request->input('query');
    $sort  = $request->input('sort');
    
    $search = Transaction::query();

    if ($query) {         
        $search->where(function($qb) use ($query) {             
            $qb->where('payment_method', 'like', "%{$query}%")
                ->orWhere(function($q) use ($query) {
                    $q->whereHas('users', function($qu) use ($query) {
                        $qu->where('name', 'like', "%{$query}%");
                    });
                });
        });
    }
    

    if ($sort) {
        $search->orderBy($sort);
    } else {
        $search->orderBy('id');  
    }

    $transactions = $search->paginate(10);

    $transactions->appends(['query' => $query, 'sort' => $sort]);

    $orderItems = OrderItems::with('book')->get();

    return view("admin.transaction.transaction", compact('transactions', 'orderItems'));
}

}
