<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBooks extends Model
{
    use HasFactory;
    const STATUS_IN_CART = 1;
    const STATUS_CHECKOUT = 2;
        protected $fillable = ['user_id', 'book_id', 'quantity', 'status'];
     public function book() {
            return $this->belongsTo(Book::class, 'book_id');
        }
      public function getStatusAttribute($value) {
            switch ($value) {
                case self::STATUS_IN_CART:
                    return 'In Cart';
                case self::STATUS_CHECKOUT:
                    return 'Checked Out';
                default:
                    return 'Unknown';
            }
        }
        public function setStatusAttribute($value) {
            $this->attributes['status'] = (int) $value;
        }
    
    
}


