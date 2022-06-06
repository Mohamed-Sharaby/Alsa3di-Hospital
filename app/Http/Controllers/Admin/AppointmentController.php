<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppointmentRequest;
use App\Http\Requests\DoctorRequest;
use App\Models\Appointment;
use App\Models\Branch;
use App\Models\Doctor;
use App\Models\Specialization;
use App\Models\User;
use App\Repositories\Repository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    protected $model;
    protected $path;

    public function __construct(Appointment $appointment)
    {
        $this->model = new Repository($appointment);
        $this->path = 'dashboard.appointments.';
    }


    public function index(Request $request)
    {
        $doctor = Doctor::findOrFail($request->doctor);
        $items = $this->model->getModel()->whereDoctorId($doctor->id)->orderBy('day', 'desc')->paginate(20);
        return view("{$this->path}index", compact('items', 'doctor'));
    }


    public function create(Request $request)
    {
        return view("{$this->path}create", [
            'doctor' => Doctor::findOrFail($request->doctor),
        ]);
    }


    public function store(Request $request)
    {
        $doctor = Doctor::findOrFail($request->doctor_id);
        //$doctor->appointments()->create($request->validated());
        $this->makeAppointments($doctor);
        return redirect(route('admin.appointments.index', ['doctor' => $doctor]))->with('success', 'تم الاضافة بنجاح');
    }


    public function edit($appointment_id)
    {
        return view("{$this->path}edit", [
            'appointment' => Appointment::findOrFail($appointment_id),
        ]);
    }


    public function update(AppointmentRequest $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update($request->validated());
        return redirect(route('admin.appointments.index', ['doctor' => $appointment->doctor_id]))->with('success', 'تم التعديل بنجاح');
    }


    public function destroy($id)
    {
        $this->model->delete($id);
        return response()->json('success');
    }

    public function makeAppointments($doctor)
    {
        $start_day = $doctor->appointments()->exists() ? Carbon::parse($doctor->appointments()->orderBy('id', 'desc')->first()->day) : Carbon::now();

        if ($start_day < Carbon::now()) {
            $start_day = Carbon::now();
        }

        $data = [];

        $data1 = strtotime($start_day);
        $data2 = strtotime($start_day->addDays(7));
        $stepVal = '+1 day';

        while ($data1 < $data2) {
            $day_string = date('D', $data1);
            //if (in_array($day_string, $doctor->vacations)) {
            //    continue;
            //}
            $day = date('Y-m-d', $data1);
            $j = strtotime($doctor->work_from);
            while ($j < strtotime($doctor->work_to)) {
                $data[] = [
                    'day' => $day,
                    'timeslot' => Carbon::parse($j)->format('h:i:s a').' - '. Carbon::parse($j)->addMinutes(10)->format('h:i:s a'),
                    'doctor_id' => $doctor->id
                ];
                $j= strtotime(Carbon::parse($j)->addMinutes(10));
            }
            $data1 = strtotime($stepVal, $data1);
            //$data[] = $day;
        }

        $doctor->appointments()->insert($data);

        return redirect()->back()->with('success', 'تم الاضافة بنجاح');
    }

}
