<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'book_id', 'quantity'];
    public function book() {
        return $this->belongsTo(Book::class, 'book_id');
    }
}