<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;

    protected $table = 'address';
    protected $fillable = [
        'name',
        'user_id',
        'nomor_telp',
        'status',
        'address_type',
        'negara',
        'street',
        'rt_rw',
        'kelurahan',
        'kecamatan',
        'kota',
        'provinsi',
        'postal_code',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
