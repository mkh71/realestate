<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable= ['user_id', 'property_id', 'for', 'date', 'message', 'admin_note', 'status'];
    /*
     * 0 for Rent; 1 for Buy, 2 for short rant
    * 0 for processing, 1 for accept, 2 for complete, 3 for denied
    */

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function property(){
        return $this->belongsTo(Property::class);
    }
}
