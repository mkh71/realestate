<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserService extends Model
{
    protected $fillable = [
        'user_id',
        'service_id',
        'price',
        'date',
        'address',
        'details',
        'admin_note',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }
}
