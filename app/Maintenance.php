<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = ['name'];

    public function serviceImages(){
        return $this->morphMany('App\ServiceImage', 'imageable');
    }
}
