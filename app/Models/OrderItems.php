<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'book_id', 'quantity', 'price'];

    /**
     * Get the order that owns the order item.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the book that this order item refers to.
     */
    public function book() 
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
