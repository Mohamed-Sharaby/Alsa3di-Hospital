<?php

namespace App\Models;

use App\Scope\ExpireScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'value', 'is_active', 'expire_at'];
    protected $casts = ['expire_at' => 'date'];

    public function cart()
    {
        return $this->hasOne(Cart::class, 'coupon_id');
    }


    protected static function booted()
    {
        static::addGlobalScope(new ExpireScope);
    }

}
