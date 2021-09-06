<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     *The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'type',
        'phone',
        'phone2',
        'isBuyer',
        'isVerified',
        'isRenter',
        'nid',
        'region',
        'image',
        'details',
        'facebook',
        'twitter',
        'skype',
        'instagram',
        'status',
        'password',
        'timezone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function UserPackages(){
        return $this->hasMany(UserPackage::class);
    }

    public function properties(){
        return $this->hasMany(Property::class);
    }
}
