<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends HelperModel
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['title', 'details', 'author', 'job', 'author_details', 'vision', 'message', 'goals', 'brief', 'image_path'];

    public function getAuthorAttribute()
    {
        if (app()->getLocale() == 'ar') return $this->ar_author;
        return $this->en_author;
    }

    public function getJobAttribute()
    {
        if (app()->getLocale() == 'ar') return $this->ar_job;
        return $this->en_job;
    }

    public function getAuthorDetailsAttribute()
    {
        if (app()->getLocale() == 'ar') return $this->ar_author_details;
        return $this->en_author_details;
    }

    public function getVisionAttribute()
    {
        if (app()->getLocale() == 'ar') return $this->ar_vision;
        return $this->en_vision;
    }

    public function getMessageAttribute()
    {
        if (app()->getLocale() == 'ar') return $this->ar_message;
        return $this->en_message;
    }

    public function getGoalsAttribute()
    {
        if (app()->getLocale() == 'ar') return $this->ar_goals;
        return $this->en_goals;
    }

    public function getBriefAttribute()
    {
        if (app()->getLocale() == 'ar') return $this->ar_brief;
        return $this->en_brief;
    }
}
