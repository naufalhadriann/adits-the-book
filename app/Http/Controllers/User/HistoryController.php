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
      $title = 'Batalkan Order ';
      $text = 'Kamu yakin mau batalkan order an?';
      confirmDelete($title,$text);
      $sort = $request->input('sort');

      $search = $request->input('search');

      $date = $request->input('date');

      $status = $request->input('status');

      if($search){
        $ordersQuery->where( function($s) use ($search){
            $s->where('id', 'like', "%{$search}%")
            ->orWhereHas('orderItems.book', function($q) use($search){
                $q->where('title', 'like', "%{$search}%");
            });
        });
      }

      if($date){
        $ordersQuery->whereDate('order_date', $date);
      }

      if($status === 'success'){
        $ordersQuery->where('status', 2);
      }elseif($status === 'pending'){
        $ordersQuery->where('status', 1);
      }elseif($status === 'failed'){
        $ordersQuery->where('status', 3);
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
      $orders->appends(['sort'=>$sort, 'search'=>$search, 'status'=>$status, 'order_date'=>$date]);
      $orderss =  Order::where('user_id', $userId)->get();

        return view ('user.history.history', compact('orders','sort','search','status','date','orderss'));
    }
}
