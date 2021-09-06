<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPackage extends Model
{
    protected $fillable = [
        'user_id',
        'package_id',
        'active_at',
        'expire_at',
        'price',
        'item',
        'property_id',
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function package(){
        return $this->belongsTo(Package::class);
    }

    public function payment(){
        return $this->hasOne(Payment::class, 'service_id', 'id')->where('service_model', 'App\Package');
    }
}
