<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "genre",
    ] ;
    public $timestamps = false;
        
    protected $table='category';
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
