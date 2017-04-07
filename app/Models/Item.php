<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'id', 'cate_id', 'name', 'alias','price','sale', 'detail', 'description',
        'guarantee', 'made',
    ];
    public function category()
    {
        return $this->belongsTo(Category::CLass);
    }
    
    public function orders()
    {
        return $this->hasMany(Order::Class);
    }
    public function cateName()
    {
        return $this->category()->name;
    }
}
