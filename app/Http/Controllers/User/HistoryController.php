<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function show(Request $request){
      $userId = Auth::id();

      $ordersQuery = Order::where('user_id',$userId)->with('orderItems.book');

      $sort = $request->input('sort');
      $search = $request->input('search');

      if($search){
        $ordersQuery->where( function($s) use ($search){
            $s->where('id', 'like', "%{$search}%")
            ->orWhereHas('orderItems.book', function($q) use($search){
                $q->where('title', 'like', "{$search}");
            });
        });
      }

      switch($sort){
        case 1 :
            $ordersQuery->orderBy('created_at', 'desc');
            break;
        case 2 :
            $ordersQuery->orderBy('created_at', 'asc');
            break;
        case 3 :
            $ordersQuery->orderBy('total_amount','desc');
            break;
        case 4 :
            $ordersQuery->orderBy('total_amount', 'asc');
            break;
        default:
        break;
      }
      $orders = $ordersQuery->orderBy('id')->paginate(5);
      $orders->appends(['sort'=>$sort, 'search'=>$search]);
        return view ('user.history.history', compact('orders','sort','search'));
    }
}
