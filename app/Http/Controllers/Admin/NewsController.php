<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\SliderRequest;
use App\Models\News;
use App\Models\Slider;
use App\Models\Specialization;
use App\Repositories\Repository;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $model;
    protected $path;

    public function __construct(News $news)
    {
        $this->model = new Repository($news);
        $this->path = 'dashboard.news.';
    }


    public function index()
    {
        $items = $this->model->all();
        return view("{$this->path}index", compact('items'));
    }



    public function create()
    {
        return view("{$this->path}create",[
            'specializations' => Specialization::pluck('ar_name', 'id')
        ]);
    }




    public function store(NewsRequest $request)
    {
        $this->model->create($request->validated());
        return redirect(route('admin.news.index'))->with('success', 'تم الاضافة بنجاح');
    }



//    public function show($id)
//    {
//        return response()->json($this->model->show($id));
//    }


    public function edit($id)
    {
        return view("{$this->path}edit", [
            'item'=> $item = $this->model->show($id),
            'specializations' => Specialization::pluck('ar_name', 'id')
        ]);
    }


    public function update(NewsRequest $request, $id)
    {
        $this->model->update($request->all(), $id);
        return redirect(route('admin.news.index'))->with('success', 'تم التعديل بنجاح');
    }



    public function destroy($id)
    {
        $this->model->delete($id);
        return response()->json('success');
    }
}
