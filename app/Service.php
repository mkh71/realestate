<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name','type', 'unit', 'details', 'price', 'status','seo_keyword'];

    public function serviceImages(){
        return $this->hasMany(ServiceImage::class);
    }
}
