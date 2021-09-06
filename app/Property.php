<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'user_id',
        'home_type_id',
        'user_packages_id',
        'title',
        'address',
        'description',
        'size',
        'price',
        'cover_image',
        'user_view',
        'for',
        'bedroom',
        'bathroom',
        'available_from',
        'advertising_close',
        'status', /*comment("0 for processing, 1 for active, 2 for booked, 3 for denied, 4 for released, 5 for Hold/SoftDelete")*/
        'state',
        'city',
        'area',
        'postal_code',
        'country',
        'street',
        'lat',
        'long',
        'seo_keyword'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function homeType(){
        return $this->belongsTo(HomeType::class);
    }

    /*public function package(){
        return $this->belongsTo(Package::class);
    }*/

    public function images(){
        return $this->hasMany(PropertyImage::class);
    }

    public function feature(){
        return $this->hasOne(Feature::class);
    }
    public function document(){
        return $this->hasOne(PropertyDocument::class);
    }

    public function user_package(){
        return $this->belongsTo(UserPackage::class, 'user_packages_id', 'id');
    }

    public function tours(){
        return $this->hasMany(Tour::class);
    }

    public function nearbies(){
        return $this->hasMany(Nearby::class);
    }
}
