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


      switch($sort){
        case 1 :
            $ordersQuery->orderBy('created_at', 'asc');
            break;
        case 2 :
            $ordersQuery->order('created_at', 'desc');
            break;
        case 3 :
            $ordersQuery->orderBy('price','asc');
            break;
        case 4 :
            $ordersQuery->orderBy('price', 'desc');
            break;
        default:
        break;
      }
      $orders = $ordersQuery->get();
        return view ('user.history.history', compact('orders','sort'));
    }
}
