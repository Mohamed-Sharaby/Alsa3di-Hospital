<?php

namespace App\Models;

use App\Http\Traits\FileOperations;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable,FileOperations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'image',
        'role',
        'is_active',
        'verify_code',
        'fcm_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['image_path'];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }


    public function setPasswordAttribute($pass)
    {
        if (!empty($pass)) {
            $this->attributes['password'] = bcrypt($pass);
        }
    }

    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function routeNotificationForFcm($notification)
    {
        return $this->fcm_token;
    }

}
