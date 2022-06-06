<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends HelperModel
{
    use HasFactory;

    protected $fillable = [
        'ar_name',
        'en_name',
        'image',
        'is_active',
    ];

    protected $appends = ['name'];


    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }


}
