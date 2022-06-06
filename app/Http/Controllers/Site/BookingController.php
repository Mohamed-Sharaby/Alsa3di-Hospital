<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookServiceRequest;
use App\Http\Requests\ConsultRequest;
use App\Http\Services\BookService;
use App\Models\Branch;
use App\Models\Service;
use App\Models\Specialization;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public $service;

    public function __construct(BookService $service)
    {
        $this->service = $service;
    }

    public function appointment()
    {
        $data['branches'] = Branch::all();
        $data['specializations'] = Specialization::all();
        return inertia('Booking/Appointment', $data);
    }

    public function consult()
    {
        $data['specializations'] = Specialization::all();
        return inertia('Booking/Consult', $data);
    }

    public function requestService()
    {
        $data['branches'] = Branch::all();
        return inertia('Booking/Service', $data);
    }

    public function conversation()
    {
        $data['specializations'] = Specialization::all();
        return inertia('Booking/Chat', $data);
    }

    public function doctors(Request $request)
    {
        return response_json(true, $this->service->getDoctors($request->all()));
    }

    public function timeslots(Request $request)
    {
        return response_json(true, $this->service->getTimeSlots($request->all()));
    }

    public function storeAppointment(Request $request)
    {
        $request->merge([
            'user_id' => auth()->id(),
            'type' => 'appointment',
            'payment' => $request->payment_type
        ]);
        $this->service->store($request->all());
        return response_json(true, __('Added Successfully'));
    }

    public function requestDoctor(ConsultRequest $request)
    {
        $request->merge([
            'user_id' => auth()->id(),
        ]);
        $this->service->store($request->all());
        return response_json(true, __('Added Successfully'));
    }

    public function storeService(BookServiceRequest $request)
    {
        $request->merge([
            'user_id' => auth()->id(),
            'type' => 'service'
        ]);
        $this->service->store($request->all());
        return response_json(true, __('Added Successfully'));
    }

    public function services(Request $request)
    {
        return response_json(true, $this->service->getServices($request->all()));
    }

    public function cancel($id)
    {
        $this->service->changeStatus($id, 'cancelled');
        return redirect()->back()->with('success', __('Updated Successfully'));
    }

}
