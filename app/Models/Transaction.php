<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table='transaction';
    protected $fillable =['order_id', 'amount', 'payment_method'];


    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function users(){
        return $this->hasMany(User::class,'id');
    }
}
