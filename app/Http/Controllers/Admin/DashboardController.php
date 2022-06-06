<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Appointment;
use App\Models\Attach;
use App\Models\Doctor;
use App\Models\User;
use App\Scope\ActiveScope;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.layouts.main');
    }


    public function active($id, $className)
    {
        $baseClass = 'App\Models\\' . $className;
        $model = $baseClass::withoutGlobalScope(ActiveScope::class)->findOrFail($id);
        $model->update(['is_active' => !$model->is_active]);
        return back()->with('success', __('تم التحديث بنجاح'));
    }


    public function delete_image($id)
    {
        $image = Attach::findOrFail($id);
        deleteImg($image->file);
        $image->delete();
        return response()->json([
            'status' => true,
            'id' => $image->id,
        ]);
    }

    public function addPatient(UserRequest $request)
    {
        User::create($request->validated());
        return redirect()->back()->with('success', 'تم الاضافة بنجاح');
    }

    public function getDoctorsByBranch($id)
    {
        $doctors = Doctor::with('user')->active()->whereBranchId($id)->get();
        return response()->json($doctors);
    }

    public function getDoctorsBySpecialist($id)
    {
        $doctors = Doctor::with('user')->active()->whereSpecializationId($id)->get();
        return response()->json($doctors);
    }

    public function getTimeslotByDoctor($id)
    {
        $times = Appointment::whereDoctorId($id)->get();
        return response()->json($times);
    }

    public function getTimeslotByDate($doctor,$date)
    {
        $times = Appointment::whereDoctorId($doctor)->whereDate('day',$date)->get();
        return response()->json($times);
    }

}
