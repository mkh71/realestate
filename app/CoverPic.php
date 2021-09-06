<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoverPic extends Model
{
    protected $fillable = ['url', 'type', 'title'];
}
