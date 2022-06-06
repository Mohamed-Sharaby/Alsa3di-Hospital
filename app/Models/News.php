<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends HelperModel
{
    use HasFactory;

    protected $fillable = ['ar_title', 'en_title', 'ar_details', 'en_details', 'specialization_id','image','author', 'is_active'];

    protected $appends = ['title', 'details', 'image_path', 'date'];

    public function getDateAttribute()
    {
        return transDate($this->created_at);
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }

    public function views()
    {
        return $this->hasMany(View::class, 'news_id');
    }

}
