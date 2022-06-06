<?php

namespace App\Models;

use App\Http\Traits\FileOperations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attach extends Model
{
    use HasFactory, FileOperations;

    protected $fillable = ['file', 'type','attachable_id','attachable_type'];

    protected $appends = ['file_path'];

    public function attachable()
    {
        return $this->morphTo();
    }

}
