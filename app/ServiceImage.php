<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceImage extends Model
{
    protected $fillable = ['url', 'service_id'];

    public function service(){
        return $this->belongsTo(Service::class);
    }

    //protected $fillable = ['url', 'imageable_id', 'imageable_type'];

   /* public function imageable(){
        return $this->morphTo();
    }*/
}
