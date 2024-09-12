<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    // Define the fillable attributes for mass assignment
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
        return $this->belongsTo(Book::class);
    }
}
