<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable = [
        'property_id',
        'name',
        'email',
        'mobile',
        'schedule',
        'message',
        'admin_note',
        'status'
    ];

    public function property(){
        return $this->belongsTo(Property::class);
    }
}
