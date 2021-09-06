<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nearby extends Model
{
    protected $fillable = [
        'property_id',
        'type',
        'name',
        'address',
        'rating',
        'review',
        'website',
        'image'
    ];
}
