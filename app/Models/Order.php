<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';


    protected $fillable = [
        'user_id',
        'total_amount',
        'order_date',
        'status',
       
    ];

    protected $dates = [
        'order_date',
    ];

    public function orderItems()
{
    return $this->hasMany(OrderItems::class, 'order_id');
}
    public function user()
    {
        return $this->belongsTo(User::class);
    }

  
}
