<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['ar_name', 'en_name', 'ar_details', 'en_details',
        'specialization_id', 'is_active', 'price', 'branch_id'];

    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->attributes['ar_name'] : $this->attributes['en_name'];
    }

    public function getDetailsAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->attributes['ar_details'] : $this->attributes['en_details'];
    }


    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }

    public function scopeActive($q)
    {
        return $q->whereIsActive(1);
    }


}
