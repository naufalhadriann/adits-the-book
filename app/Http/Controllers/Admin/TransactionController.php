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
    

    switch($sort){
        case 1 :
            $search->orderBy('amount','asc');
            break;
        case 2:
            $search->orderBy('amount','desc');
            break;
        case 3:
            $search->orderBy('created_at','desc');
            break;
        case 4:
            $search->orderBy('created_at','asc');
            break;
        default:
            $search->orderBy('id');
            break;
    }

    $transactions = $search->paginate(10);
    
    $transactions->appends(['query' => $query, 'sort' => $sort]);

    $orderItems = OrderItems::with('book')->get();

    return view("admin.transaction.transaction", compact('transactions', 'orderItems'));
}

}
