<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'type', 'ar_value', 'en_value', 'page', 'title'];


    public function getValueAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->ar_value : $this->en_value;
    }



}
