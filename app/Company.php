<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'phone', 'phone1', 'fax', 'email', 'about', 'about_footer',
        'address', 'facebook', 'twitter', 'instagram', 'whatsapp', 'logo',
        'favicon', 'mobile_logo', 'footer_logo', 'privacy_policy', 'terms_condition'
    ];
}
