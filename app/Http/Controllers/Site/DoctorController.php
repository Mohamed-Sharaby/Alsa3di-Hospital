<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Doctor;
use App\Models\Specialization;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $doctors = Doctor::with('user')->orderBy('is_distinct');
        if (!is_null($request->branch)) {
            $doctors = $doctors->whereBranchId($request->branch);
        }

        if (!is_null($request->specialty)) {
            $doctors = $doctors->whereSpecializationId($request->specialty);
        }

        if (!is_null($request->word)) {
            $doctors = $doctors->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->word}%");
            });
        }
        $doctors = $doctors->paginate(20);
        //dd($doctors);
        $branches = Branch::all()->map(function ($item) { return ['id' => $item->id, 'name' => $item->name]; });
        $specializations = Specialization::all()->map(function ($item) { return ['id' => $item->id, 'name' => $item->name]; });
        return inertia('Doctor/Index', [
            'items' => $doctors,
            'branches' => $branches,
            'specializations' => $specializations,
            'filters' => ['branch' => $request->branch, 'word' => $request->word, 'specialty' => $request->specialty]
        ]);

    }

    public function show(Doctor $doctor)
    {
        $doctor->load(['user', 'services']);
        return inertia('Doctor/Show', ['item' => $doctor]);
    }

}
