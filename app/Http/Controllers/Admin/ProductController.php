<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\SubCategoryRequest;
use App\Models\Attach;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    protected $model;
    protected $path;

    public function __construct(Product $product)
    {
        $this->model = new Repository($product);
        $this->path = 'dashboard.products.';
    }


    public function index()
    {
        $items = $this->model->getModel()->get();
        return view("{$this->path}index", compact('items'));
    }

    public function create()
    {
        return view("{$this->path}create", [
            'subCategories' => SubCategory::pluck('ar_name', 'id')
        ]);
    }


    public function store(ProductRequest $request)
    {
        DB::beginTransaction();
        $product = $this->model->create($request->validated());

        if (is_array($request->images)) {
            foreach ($request->images as $image) {
                $product->images()->create(['file' => $image]);
            }
        }
        DB::commit();
        return redirect(route('admin.products.index'))->with('success', 'تم الاضافة بنجاح');
    }


    public function edit($id)
    {
        return view("{$this->path}edit", [
            'item' => $this->model->show($id),
            'subCategories' => SubCategory::pluck('ar_name', 'id')
        ]);
    }


    public function update(ProductRequest $request, $id)
    {
        DB::beginTransaction();
        $this->model->update($request->all(), $id);
        if (is_array($request->images)) {
            foreach ($request->images as $image) {
                $product = Product::findOrFail($id);
                $product->images()->create(['file' => $image]);
            }
        }
        DB::commit();

        return redirect(route('admin.products.index'))->with('success', 'تم التعديل بنجاح');
    }


    public function destroy($id)
    {
        $this->model->delete($id);
        return response()->json('success');
    }

}
