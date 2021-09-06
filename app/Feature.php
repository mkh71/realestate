<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = [
        'property_id',
        'mortgage_term',
        'tax',
        'insurance',
        'hoa_fee',
        'interest_rate',
        'built_year',

        'livable_room',
        'balcony',
        'level',
        'total_unit',
        'unit_per_level',
        'heating',
        'cooling',
        'parking',
        'total_parking_space',
        'lot',
        'construction_materials',
        'flooring',
        'roof',
        'fireplace',
        'spa',
        'water',
        'outdoor_feature',
        'scenery_view',
        'allowed_pet',
        'other_feature',

        'dining',
        'drawing',
        'basement',
        'public_gasline',
        'public_waterline',
        'furnished',
        'swimming_pool',
        'outdoor_shower',
        'wifi',
        'ac',
        'tv_cable',
        'laundry',
        'gym',
        'front_yard',
        'private_space',
        'lawn',
        'sauna',
        'wine_cellar',
        'pet_allow',
        'refrigerator',
        'dishwasher',
        'dryer',
        'microwave',
        'washer',
        'barbeque',
        'window_covering',
        'other_appliance'
    ];

    public function property(){
        return $this->belongsTo(Property::class);
    }
}
