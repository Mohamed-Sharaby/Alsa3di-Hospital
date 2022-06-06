<?php

namespace App\Models;

use App\Http\Traits\FileOperations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'doctor_id',
        'specialization_id',
        'service_id',
        'branch_id',
        'appointment_id',
        'date',
        'type',
        'status',
        'cancelled_by',
        'phone',
        'payment',
        'payment_status',
        'price',
        'details'
    ];

    protected $casts = ['date' => 'date'];

    protected $appends = ['type_lang', 'status_lang'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function getStatusLangAttribute()
    {
        $data = [
            'new' => 'جديد',
            'confirmed' => 'تم الموافقة',
            'refused' => 'مرفوض',
            'ignored' => 'تجاهل',
            'cancelled' => 'ملغي'
        ];
        return $data[$this->status];
    }

    public function getTypeLangAttribute()
    {
        $data = [
            'appointment' => 'حجز موعد',
            'chat' => 'طلب محادثة',
            'consult' => 'طلب استشارة',
            'service' => 'طلب خدمة'
        ];
        return $data[$this->type];
    }

    public function files()
    {
        return $this->morphMany(Attach::class, 'attachable');
    }
}
