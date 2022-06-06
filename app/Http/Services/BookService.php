<?php

namespace App\Http\Services;

use App\Events\NewAppointment;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Reservation;
use App\Models\Service;
use Carbon\Carbon;

class BookService
{
    public $doctor;
    public $reservation;

    public function __construct(Doctor $doctor, Reservation $reservation)
    {
        $this->doctor = $doctor;
        $this->reservation = $reservation;
    }

    public function getDoctors($data)
    {
        $doctors = $this->doctor->newQuery()->with('user');
        if (isset($data['branch_id']) && !is_null($data['branch_id'])) $doctors = $doctors->whereBranchId($data['branch_id']);
        if (isset($data['specialization_id']) && !is_null($data['specialization_id'])) $doctors = $doctors->whereSpecializationId($data['specialization_id']);
        return $doctors->get();
    }

    public function getTimeSlots($data)
    {
        $appointments = Appointment::where('doctor_id', $data['doctor'])->when(isset($data['date']), function ($q) use ($data) {
            $q->whereDate('day', Carbon::parse($data['date']));
        })->get()->map(function ($slot) {
            return [
                'id' => $slot->id,
                'timeslot' => $slot->timeslot,
                'taken' => $slot->reservation()->exists(),
            ];
        });

        return $appointments;
    }

    public function store($data)
    {
        if (isset($data['doctor_id'])) {
            $doctor = $this->doctor->where('id', $data['doctor_id'])->first();
            if ($data['type'] == 'appointment') $price = $doctor->appointment_price ?? 0;
            elseif ($data['type'] == 'consult') $price = $doctor->consult_price ?? 0;
            else $price = $doctor->price ?? 0;
            $data['price'] = $price;
        }
        if (isset($data['service_id'])) {
            $service = Service::find($data['service_id']);
            $data['price'] = $service->price ?? 0;
        }

        $reservation = $this->reservation->create($data);

        $reservation = $this->reservation->with(['user','doctor.user','appointment'])->find($reservation->id);

       // broadcast(new NewAppointment($reservation->toArray()));

        return $reservation;
    }

    public function getServices($data)
    {
        $services = Service::query();
        if (isset($data['branch_id']) && !is_null($data['branch_id'])) $services = $services->whereBranchId($data['branch_id']);
        $services = $services->get();
        return $services;
    }

    public function changeStatus($id, $status)
    {
        $this->reservation->where('id', $id)->update(['status' => $status]);
    }

    public function show($id)
    {
        return $this->reservation->with(['doctor.user', 'service'])->find($id);
    }

}