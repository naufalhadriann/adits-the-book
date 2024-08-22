<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        "image",
        "description",
        "penerbit",
        "author",
        "price",
        "category_id",
        "stock",
        "publish_date",
        "discount",

    ] ;
    
    public $timestamps = true;
    protected $table='book';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
 
    
    public function hasDiscount(){
      return  $this->discount > 0;
    }
    public function getDiscountedPriceAttribute()
    {
        if ($this->hasDiscount()) {
            $discountAmount = ($this->price * $this->discount) / 100;
            return $this->price - $discountAmount;
        }
        return $this->price;
    }
    public function getDiscountAmountAttribute()
{
    if ($this->hasDiscount()) {
        return ($this->price * $this->discount) / 100;
    }
    return 0;
}
}
