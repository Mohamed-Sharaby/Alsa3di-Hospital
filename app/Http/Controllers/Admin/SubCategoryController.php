<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use App\Repositories\Repository;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    protected $model;
    protected $path;

    public function __construct(SubCategory $subCategory)
    {
        $this->model = new Repository($subCategory);
        $this->path = 'dashboard.sub-categories.';
    }


    public function index()
    {
        $items = $this->model->getModel()->get();
        return view("{$this->path}index", compact('items'));
    }

    public function create()
    {
        return view("{$this->path}create", [
            'categories' => Category::pluck('ar_name', 'id')
        ]);
    }


    public function store(SubCategoryRequest $request)
    {
        $this->model->create($request->validated());
        return redirect(route('admin.sub-categories.index'))->with('success', 'تم الاضافة بنجاح');
    }


    public function edit($id)
    {
        return view("{$this->path}edit", [
            'item' => $this->model->show($id),
            'categories' => Category::pluck('ar_name', 'id')
        ]);
    }


    public function update(SubCategoryRequest $request, $id)
    {
        $this->model->update($request->all(), $id);
        return redirect(route('admin.sub-categories.index'))->with('success', 'تم التعديل بنجاح');
    }


    public function destroy($id)
    {
        $this->model->delete($id);
        return response()->json('success');
    }
}
