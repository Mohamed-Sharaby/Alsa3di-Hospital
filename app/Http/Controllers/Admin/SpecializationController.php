<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SpecializationRequest;
use App\Models\Specialization;
use App\Repositories\Repository;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    protected $model;
    protected $path;

    public function __construct(Specialization $specialization)
    {
        $this->model = new Repository($specialization);
        $this->path = 'dashboard.specializations.';
    }


    public function index()
    {
        $items = $this->model->all();
        return view("{$this->path}index", compact('items'));
    }


    public function create()
    {
        return view("{$this->path}create");
    }


    public function store(SpecializationRequest $request)
    {
        $this->model->create($request->validated());
        return redirect(route('admin.specializations.index'))->with('success', 'تم الاضافة بنجاح');
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
        $specialization = $this->model->show($id);
        return view("{$this->path}edit", ['item' => $specialization]);
    }



    public function update(SpecializationRequest $request, $id)
    {
        $this->model->update($request->validated(), $id);
        return redirect(route('admin.specializations.index'))->with('success', 'تم التعديل بنجاح');
    }


    public function destroy($id)
    {
        $this->model->delete($id);
        return response()->json('success');
    }
}
