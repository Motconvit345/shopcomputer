<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'address', 'password','role', 'avatar', 'phone', 'confirmed', 'confirmation_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function bills()
    {
        return $this->hasMany(Bill::Class);
    }

    public function orders()
    {
        return $this->hasMany(Order::Class);
    }

    public function role()
    {
        return $this->belongsTo(Role::CLass);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function isAdmin()
    {
        if ($this->attributes['role_id']  !=4) {
            return true;
        }
        
        return false;
    }
}
