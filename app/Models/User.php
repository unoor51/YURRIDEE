<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password','mobile','device_type','user_type','device_token','profile','cnic'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @var CONST
     */
    const RIDER_USER_TYPE = 'rider';
    const DRIVER_USER_TYPE = 'driver';
    const SUPER_ADMIN_USER_TYPE = 'super_admin';


    /**
     * @var CONST
     */
    const USERS_TYPES = [
        self::RIDER_USER_TYPE,
        self::DRIVER_USER_TYPE,
        self::SUPER_ADMIN_USER_TYPE
    ];
}
