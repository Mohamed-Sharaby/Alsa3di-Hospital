<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ReservationsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use App\Http\Requests\ReservationRequest;
use App\Http\Requests\ServiceRequest;
use App\Http\Requests\SpecializationRequest;
use App\Models\Appointment;
use App\Models\Branch;
use App\Models\Doctor;
use App\Models\Product;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\Specialization;
use App\Models\User;
use App\Notifications\MedicalFileAttach;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    protected $model;
    protected $path;

    public function __construct(Reservation $reservation)
    {
        $this->model = new Repository($reservation);
        $this->path = 'dashboard.reservations.';
    }


    public function index(ReservationsDataTable $dataTable)
    {
        return $dataTable->render("{$this->path}index");
    }


    public function create()
    {
        return view("{$this->path}create", [
            'users' => User::whereRole('patient')->pluck('name', 'id'),
            'doctors' => Doctor::with('user')->pluck('user_id', 'id'),
            'branches' => Branch::active()->pluck('ar_name', 'id'),
            'specializations' => Specialization::pluck('ar_name', 'id'),
            'services' => Service::pluck('ar_name', 'id'),
            'appointments' => Appointment::all(),
        ]);
    }


    public function store(ReservationRequest $request)
    {
        $this->model->create($request->validated());
        return redirect(route('admin.reservations.index'))->with('success', 'تم الاضافة بنجاح');
    }


    public function show($id)
    {
        $reservation = $this->model->show($id);
        return view("{$this->path}show", compact('reservation'));
    }

    public function edit($id)
    {
        $reservation = $this->model->show($id);
        return view("{$this->path}edit", [
            'reservation' => $reservation,
            'users' => User::whereRole('patient')->pluck('name', 'id'),
            'doctors' => User::whereRole('doctor')->pluck('name', 'id'),
            'branches' => Branch::pluck('ar_name', 'id'),
            'specializations' => Specialization::pluck('ar_name', 'id'),
            'services' => Service::pluck('ar_name', 'id'),
            'appointments' => Appointment::pluck('day', 'id'),
        ]);
    }


    public function update(ReservationRequest $request, $id)
    {
        DB::beginTransaction();
        $reservation = Reservation::findOrFail($id);
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                //  $fileName = $file->getClientOriginalName();
                //  $file->move(storage_path("app/public/uploads"), $fileName);
                $reservation->files()->create(['file' => $file]);
            }
            $reservation->user->notify(new MedicalFileAttach());
        }
        $reservation->update($request->validated());
        DB::commit();

        return redirect(route('admin.reservations.index'))->with('success', 'تم التعديل بنجاح');
    }


    public function destroy($id)
    {
        $this->model->delete($id);
        return response()->json('success');
    }


    public function changeStatus(Request $request, $id)
    {
        $reservation = $this->model->show($id);
        $request->validate(['status' => 'required|in:new,confirmed,refused,ignored,cancelled']);
        $reservation->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'تم تغيير الحالة بنجاح');
    }
}
