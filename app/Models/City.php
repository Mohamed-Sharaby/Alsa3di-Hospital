<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends HelperModel
{
    use HasFactory;

    protected $fillable = ['ar_name', 'en_name', 'area_id'];

    protected $appends = ['name'];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
