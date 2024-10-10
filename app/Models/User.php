<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
   
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'profile_image'
    ];
    protected $table='users';

    protected $cast =['role'=>'integer'];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => 'integer',
        ];
    }
    public function getRoleLabelAttribute()
    {
        return $this->role == 1 ? 'Admin' : 'User';
    }
    public function address()
    {
        return $this->hasOne(address::class);
    }
    public function hasAddress()
    {
        return $this->address()->exists();
    }

}
