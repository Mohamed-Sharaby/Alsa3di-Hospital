<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends HelperModel
{
    use HasFactory;

    protected $fillable = [
        'ar_name',
        'en_name',
        'image',
        'ar_details',
        'en_details',
        'address',
        'lat',
        'lng',
        'is_active',
    ];

    protected $appends = ['name', 'details'];

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function images()
    {
        return $this->morphMany(Attach::class, 'attachable');
    }

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

    public function distinct_doctors()
    {
        return $this->hasMany(Doctor::class)->whereIsDistinct(1);
    }

    public function scopeActive($q)
    {
        return $q->whereIsActive(1);
    }

}
