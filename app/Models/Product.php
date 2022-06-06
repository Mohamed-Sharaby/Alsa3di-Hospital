<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends HelperModel
{
    use HasFactory;

    protected $fillable = [
        'ar_name',
        'en_name',
        'image',
        'ar_details',
        'en_details',
        'ar_description',
        'en_description',
        'ar_overview',
        'en_overview',
        'price_before_discount',
        'price',
        'is_active',
        'sub_category_id',
    ];

    protected $appends = ['name', 'details', 'description', 'overview', 'image_path'];

    public function getDescriptionAttribute()
    {
        if (app()->getLocale() == 'ar') return $this->ar_description;
        return $this->en_description;
    }

    public function getOverviewAttribute()
    {
        if (app()->getLocale() == 'ar') return $this->ar_overview;
        return $this->en_overview;
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function images()
    {
        return $this->morphMany(Attach::class, 'attachable');
    }
}
