<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends HelperModel
{
    use HasFactory;

    protected $fillable = [
        'ar_name',
        'en_name',
        'image',
        'category_id',
        'is_active',
    ];

    protected $appends = ['name'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
