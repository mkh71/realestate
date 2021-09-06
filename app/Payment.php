<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'payment_id',
        'payer_id',
        'payer_email',
        'amount',
        'method',
        'service_id',
        'service_model',
        'currency',
        'payment_status'
    ];

    public function user(){
        return $this->hasOne(User::class);
    }
}
