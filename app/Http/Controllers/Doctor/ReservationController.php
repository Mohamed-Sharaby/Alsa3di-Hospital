<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function index()
    {
        return view('doctors.reservations.index', [
            'items' => Reservation::whereDoctorId(auth()->user()->doctor->user_id)->orderBy('date', 'desc')->paginate(10)
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


    public function show(Reservation $reservation)
    {
        return view("doctors.reservations.show", compact('reservation'));
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
         //
    }

    public function changeStatus(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $request->validate(['status' => 'required|in:new,confirmed,refused,ignored,cancelled']);
        $reservation->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'تم تغيير الحالة بنجاح');
    }

}
