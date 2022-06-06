<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    public function index()
    {
        $specialties = Specialization::all()->map(function ($item) {
           return ['id' => $item->id, 'name' => $item->name, 'image' => $item->image_path];
        });
        return inertia('Specialty/Index', ['items' => $specialties]);
    }

    public function show($id)
    {
        $item = Specialization::with(['services', 'doctors.user' => function ($q) {
            $q->limit(8);
        }])->find($id);
        return inertia('Specialty/Show', ['item' => $item]);
    }
}
