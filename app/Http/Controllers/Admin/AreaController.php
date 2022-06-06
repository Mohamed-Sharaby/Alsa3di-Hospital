<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AreaRequest;
use App\Models\Area;
use App\Repositories\Repository;

class AreaController extends Controller
{
    protected $model;
    protected $path;

    public function __construct(Area $area)
    {
        $this->model = new Repository($area);
        $this->path = 'dashboard.areas.';
    }


    public function index()
    {
        $items = $this->model->getModel()->get();
        return view("{$this->path}index", compact('items'));
    }

    public function create()
    {
        return view("{$this->path}create");
    }


    public function store(AreaRequest $request)
    {
        $this->model->create($request->validated());
        return redirect(route('admin.areas.index'))->with('success', 'تم الاضافة بنجاح');
    }


    public function edit($id)
    {
        $item = $this->model->show($id);
        return view("{$this->path}edit", compact('item'));
    }


    public function update(AreaRequest $request, $id)
    {
        $this->model->update($request->all(), $id);
        return redirect(route('admin.areas.index'))->with('success', 'تم التعديل بنجاح');
    }


    public function destroy($id)
    {
        $this->model->delete($id);
        return response()->json('success');
    }
}
