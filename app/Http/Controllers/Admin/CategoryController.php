<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\SpecializationRequest;
use App\Models\Category;
use App\Repositories\Repository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $model;
    protected $path;

    public function __construct(Category $category)
    {
        $this->model = new Repository($category);
        $this->path = 'dashboard.categories.';
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


    public function store(CategoryRequest $request)
    {
        $this->model->create($request->validated());
        return redirect(route('admin.categories.index'))->with('success', 'تم الاضافة بنجاح');
    }


    public function edit($id)
    {
        $item = $this->model->show($id);
        return view("{$this->path}edit", compact('item'));
    }


    public function update(CategoryRequest $request, $id)
    {
        $this->model->update($request->all(), $id);
        return redirect(route('admin.categories.index'))->with('success', 'تم التعديل بنجاح');
    }


    public function destroy($id)
    {
        $this->model->delete($id);
        return response()->json('success');
    }
}
