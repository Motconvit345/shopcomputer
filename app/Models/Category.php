<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'alias',
    ];
    public function items()
    {
        return $this->hasMany(Item::Class);
    }
    public function parentName()
    {
        return Category::select('name')->find($this->parent_id);
    }
}
