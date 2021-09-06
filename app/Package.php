<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
   protected $fillable = ['name','day', 'item', 'price', 'percent', 'note', 'status'];

   /*public function homeType(){
       return $this->belongsTo(HomeType::class);
   }

    public function properties(){
        return $this->hasMany(Property::class);
    }*/

    public function UserPackages(){
        return $this->hasMany(UserPackage::class);
    }
}
