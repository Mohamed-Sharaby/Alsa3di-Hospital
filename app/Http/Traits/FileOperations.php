<?php

namespace App\Http\Traits;

trait FileOperations
{

    public function setImageAttribute($attr)
    {
        if (!empty($attr)) {
            if ($this->image) deleteImg($this->image);
            $this->attributes['image'] = uploadFile($attr);
        }
    }

    public function getImagePathAttribute()
    {
        if (!$this->image) return asset('default/assets/images/logo.png');
        return getImg($this->image);
    }

    public function setAttachAttribute($attr)
    {
        if (!empty($attr)) {
            if ($this->attach) deleteImg($this->attach);
            $this->attributes['attach'] = uploadFile($attr);
        }
    }

    public function getAttachPathAttribute()
    {
        if (!$this->attach) return asset('default/assets/images/logo.png');
        return getImg($this->attach);
    }

    public function setFileAttribute($attr)
    {
        if (!empty($attr)) {
            if ($this->file) deleteImg($this->file);
            $this->attributes['file'] = uploadFile($attr);
        }
    }

    public function getFilePathAttribute()
    {
        if (!$this->file) return asset('default/assets/images/logo.png');
        return getImg($this->file);
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($model) {
            deleteImg($model->image);
            deleteImg($model->file);
        });
    }


}
