<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongTo(User::CLass);
    }
    
    public function item()
    {
        return $this->belongTo(Item::CLass);
    }
}
