<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Service;
use App\Models\Specialization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{

    public function index()
    {
        return view('doctors.layouts.main');
    }

    public function edit_user_account()
    {
        return view('doctors.user-account.edit');
    }


    public function update_user_account(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:users,email,' . auth()->user()->id,
            'phone' => 'required|numeric|phone:EG,SA|unique:users,phone,' . auth()->user()->id,
            'password' => 'nullable|confirmed|min:6',
            'role' => 'nullable|in:doctor,patient',
            'is_active' => 'boolean',
            'image' => 'sometimes|image|mimes:jpg,jpeg,png,bmp,svg,gif|max:2048',
        ]);

        $user = User::findOrFail(auth()->user()->id);
        $user->update($request->all());
        return back()->with('success', 'تم التعديل بنجاح');
    }


    public function edit_doctor_account()
    {

        return view('doctors.doctor-account.edit', [
            'doctor' => auth()->user()->doctor,
            'branches' => Branch::pluck('ar_name', 'id'),
            'services' => Service::pluck('ar_name', 'id'),
            'specializations' => Specialization::pluck('ar_name', 'id')
        ]);
    }


    public function update_doctor_account(Request $request)
    {
        $request->validate([
            'ar_job' => 'required|string|max:191',
            'en_job' => 'required|string|max:191',
            'ar_details' => 'required|string',
            'en_details' => 'required|string',
            'ar_lang' => 'required|string',
            'en_lang' => 'required|string',
            'ar_clinic' => 'required|string',
            'en_clinic' => 'required|string',
            'appointment_price' => 'required',
            'consult_price' => 'required',
            'price' => 'required',
            'detection_time' => 'required',
            'user_id' => 'nullable|numeric|exists:users,id',
            'branch_id' => 'required|numeric|exists:branches,id',
            'specialization_id' => 'required|numeric|exists:specializations,id',
            'work_from' => 'required',
            'work_to' => 'required',
            'vacations' => 'required|array',
            'is_distinct' => 'boolean',
            'service_id' => 'required|array'
        ]);

        DB::beginTransaction();
        $doctor = auth()->user()->doctor;
        $doctor->update($request->all());
        $doctor->services()->sync($request->service_id);
        DB::commit();
        return back()->with('success', 'تم التعديل بنجاح');
    }

}
