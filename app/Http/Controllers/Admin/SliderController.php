<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use App\Repositories\Repository;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    protected $model;
    protected $path;

    public function __construct(Slider $slider)
    {
        $this->model = new Repository($slider);
        $this->path = 'dashboard.sliders.';
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




    public function store(SliderRequest $request)
    {
        $this->model->create($request->validated());
        return redirect(route('admin.sliders.index'))->with('success', 'تم الاضافة بنجاح');
    }



//    public function show($id)
//    {
//        return response()->json($this->model->show($id));
//    }


    public function edit($id)
    {
        $item = $this->model->show($id);
        return view("{$this->path}edit", compact('item'));
    }


    public function update(SliderRequest $request, $id)
    {
        $this->model->update($request->all(), $id);
        return redirect(route('admin.sliders.index'))->with('success', 'تم التعديل بنجاح');
    }



    public function destroy($id)
    {
        $this->model->delete($id);
        return response()->json('success');
    }
}
