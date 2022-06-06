<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends HelperModel
{
    use HasFactory;

    protected $fillable = ['ar_name', 'en_name','is_active'];

    protected $appends = ['name'];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

}
