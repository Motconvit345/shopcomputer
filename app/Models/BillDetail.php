<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = 'bill_details';
    protected $fillable = ['bill_id', 'item_id', 'quality', 'price', 'total'];
    
    public function bill()
    {
        return $this->belongsTo(Bill::CLass);
    }
    
    public function item()
    {
        return $this->belongsTo(Item::Class);
    }
}
