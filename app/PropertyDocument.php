<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyDocument extends Model
{
    public $fillable = [ 'property_id', 'doc_pdf', 'other_pdf', 'youtube_video', 'matterport_video' ];

    public function property(){
        return $this->belongsTo(Property::class);
    }
}
