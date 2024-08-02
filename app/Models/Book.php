<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        "image",
        "description",
        "author",
        "price",
        "stock",

    ] ;
    
    public $timestamps = true;
    protected $table='book';

    public function category()
    {
        return $this->belongsTo(Category::class, "category_id");
    }
}
