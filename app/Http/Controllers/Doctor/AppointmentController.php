<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    public function index()
    {
        return view('doctors.appointments.index', [
            'items' => Appointment::whereDoctorId(auth()->user()->doctor->user_id)->orderBy('day', 'desc')->paginate(20)
        ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return response()->json('success');
    }
}
