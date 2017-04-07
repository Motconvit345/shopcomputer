<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';
    protected $fillable = [
        'id', 'user_id', 'payment', 'total', 'status_payment', 'message',
        'payment_info', 'status_ship', 'user_ship', 'code_bill'
    ];
    public function user()
    {
        return $this->belongsTo(User::CLass);
    }
    
    public function billDetails()
    {
        return $this->hasMany(billDetail::Class);
    }
}
