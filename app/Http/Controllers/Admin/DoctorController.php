<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use App\Http\Requests\ServiceRequest;
use App\Http\Requests\SpecializationRequest;
use App\Models\Branch;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\Specialization;
use App\Models\User;
use App\Repositories\Repository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    protected $model;
    protected $path;

    public function __construct(Doctor $doctor)
    {
        $this->model = new Repository($doctor);
        $this->path = 'dashboard.doctors.';
    }


    public function index()
    {
        $items = $this->model->all();
        return view("{$this->path}index", compact('items'));
    }


    public function create()
    {
        return view("{$this->path}create", [
            'branches' => Branch::pluck('ar_name', 'id'),
            'services' => Service::pluck('ar_name', 'id'),
            'specializations' => Specialization::pluck('ar_name', 'id')
        ]);
    }


    public function store(DoctorRequest $request)
    {
        DB::beginTransaction();
        $user = User::create($request->validated());
        $user->doctor()->create($request->validated());
        $user->doctor->services()->attach($request->service_id);
        DB::commit();
        return redirect(route('admin.doctors.index'))->with('success', 'تم الاضافة بنجاح');
    }



//    public function show($id)
//    {
//        $item = $this->model->show($id);
//        if (\request()->ajax())
//            return response()->json($item);
//        return view("{$this->path}show", compact('item'));
//    }

    public function edit($id)
    {
        $doctor = $this->model->show($id);
        return view("{$this->path}edit", [
            'doctor' => $doctor,
            'branches' => Branch::pluck('ar_name', 'id'),
            'services' => Service::pluck('ar_name', 'id'),
            'specializations' => Specialization::pluck('ar_name', 'id')
        ]);
    }


    public function update(DoctorRequest $request, $id)
    {
        DB::beginTransaction();
        $doctor = Doctor::findOrFail($id);
        $user = User::findOrFail($doctor->user_id);
        $user->update($request->validated());
        $user->doctor()->update($request->validated(), $id);
        $user->doctor->services()->sync($request->service_id);
        DB::commit();
        return redirect(route('admin.doctors.index'))->with('success', 'تم التعديل بنجاح');
    }


    public function destroy($id)
    {
        $this->model->delete($id);
        return response()->json('success');
    }
}
