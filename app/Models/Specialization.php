<?php

namespace App\Models;

use App\Http\Traits\FileOperations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialization extends HelperModel
{
    use HasFactory,FileOperations;

    protected $fillable = ['ar_name', 'en_name', 'ar_details', 'en_details', 'image', 'is_active'];

    protected $appends = ['name', 'details', 'image_path'];

    public function getNameAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->attributes['ar_name'] : $this->attributes['en_name'];
    }

    public function getDetailsAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->attributes['ar_details'] : $this->attributes['en_details'];
    }


    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function scopeActive($q)
    {
        return $q->whereIsActive(1);
    }

}
