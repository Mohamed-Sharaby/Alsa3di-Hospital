<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['ar_job', 'en_job', 'ar_details', 'en_details', 'ar_lang', 'en_lang',
        'ar_clinic', 'en_clinic', 'appointment_price', 'consult_price', 'price', 'detection_time', 'user_id',
        'specialization_id', 'is_active', 'branch_id', 'work_from', 'work_to', 'vacations', 'is_distinct'];

    protected $casts = ['vacations' => 'array'];

    protected $appends = ['job', 'details', 'lang', 'clinic'];

    public function getJobAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->attributes['ar_job'] : $this->attributes['en_job'];
    }

    public function getDetailsAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->attributes['ar_details'] : $this->attributes['en_details'];
    }

    public function getLangAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->attributes['ar_lang'] : $this->attributes['en_lang'];
    }

    public function getClinicAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->attributes['ar_clinic'] : $this->attributes['en_clinic'];
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'doctor_service');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function scopeActive($q)
    {
        return $q->whereIsActive(1);
    }


}
