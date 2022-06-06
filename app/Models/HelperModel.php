<?php

namespace App\Models;

use App\Http\Traits\FileOperations;
use App\Scope\ActiveScope;
use Illuminate\Database\Eloquent\Model;

class HelperModel extends Model
{
    use FileOperations;

    protected static function booted()
    {
        static::addGlobalScope(new ActiveScope);
    }

    public function getNameAttribute()
    {
        if (app()->getLocale() == 'ar') return $this->ar_name;
        return $this->en_name;
    }

    public function getTitleAttribute()
    {
        if (app()->getLocale() == 'ar') return $this->ar_title;
        return $this->en_title;
    }

    public function getDetailsAttribute()
    {
        if (app()->getLocale() == 'ar') return $this->ar_details;
        return $this->en_details;
    }
}