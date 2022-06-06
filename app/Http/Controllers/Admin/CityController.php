<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Models\Area;
use App\Models\Category;
use App\Models\City;
use App\Repositories\Repository;
use Illuminate\Http\Request;

class CityController extends Controller
{
    protected $model;
    protected $path;

    public function __construct(City $city)
    {
        $this->model = new Repository($city);
        $this->path = 'dashboard.cities.';
    }


    public function index()
    {
        $items = $this->model->getModel()->get();
        return view("{$this->path}index", compact('items'));
    }

    public function create()
    {
        return view("{$this->path}create", [
            'areas' => Area::pluck('ar_name', 'id')
        ]);
    }


    public function store(CityRequest $request)
    {
        $this->model->create($request->validated());
        return redirect(route('admin.cities.index'))->with('success', 'تم الاضافة بنجاح');
    }


    public function edit($id)
    {
        return view("{$this->path}edit", [
            'item' => $this->model->show($id),
            'areas' => Area::pluck('ar_name', 'id')
        ]);
    }


    public function update(CityRequest $request, $id)
    {
        $this->model->update($request->all(), $id);
        return redirect(route('admin.cities.index'))->with('success', 'تم التعديل بنجاح');
    }


    public function destroy($id)
    {
        $this->model->delete($id);
        return response()->json('success');
    }
}
