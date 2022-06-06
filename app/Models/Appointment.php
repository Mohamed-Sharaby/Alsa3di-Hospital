<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['doctor_id', 'day', 'timeslot'];

    protected $casts = ['day' => 'date'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function reservation()
    {
        return $this->hasOne(Reservation::class, 'appointment_id');
    }
}
