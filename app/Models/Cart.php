<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shipping_fees',
        'status',
        'coupon_discount',
        'coupon_val',
        'total',
        'delivery_cost',
        'name',
        'phone',
        'email',
        'area_id',
        'city_id',
        'street',
        'building_number',
        'notes',
        'payment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(CartItem::class, 'cart_id');
    }


    public function getTotalProductsPriceAttribute()
    {
        return $this->items()->get()->sum('total_price');
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class, 'coupon_id');
    }

    public function getStatusLangAttribute()
    {
        $data = [
            'created' => 'تم انشاءه',
            'new' => 'جديد',
            'waiting' => 'في الانتظار',
            'confirmed' => 'تم الموافقة',
            'accepted' => 'مقبول',
            'rejected' => 'مرفوض',
            'cancelled' => 'ملغي',
            'finished' => 'منتهي',
        ];
        return $data[$this->status];
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

}
