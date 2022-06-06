<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends HelperModel
{
    use HasFactory;

    protected $fillable = ['ar_title', 'en_title', 'ar_details', 'en_details', 'image', 'is_active', 'type'];
}
