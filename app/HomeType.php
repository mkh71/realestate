<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeType extends Model
{
    protected $fillable = ['name', 'icon', 'status'];

    public function properties(){
        return $this->hasMany(Property::class);
    }

    public function packages(){
        return $this->hasMany(Package::class);
    }
}
