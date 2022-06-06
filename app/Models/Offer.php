<?php

namespace App\Models;

use App\Http\Traits\FileOperations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory,FileOperations;

    protected $fillable = [
        'name',
        'image',
        'url',
        'is_active',
    ];

    protected $appends = ['image_path'];

}
