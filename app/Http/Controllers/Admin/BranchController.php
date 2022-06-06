<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BranchRequest;
use App\Http\Requests\SpecializationRequest;
use App\Models\Branch;
use App\Models\Specialization;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BranchController extends Controller
{
    protected $model;
    protected $path;

    public function __construct(Branch $branch)
    {
        $this->model = new Repository($branch);
        $this->path = 'dashboard.branches.';
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


    public function store(BranchRequest $request)
    {
        DB::beginTransaction();
        $branch = $this->model->create($request->validated());

        if (is_array($request->images)) {
            foreach ($request->images as $image) {
                $branch->images()->create(['file' => $image]);
            }
        }
        DB::commit();
        return redirect(route('admin.branches.index'))->with('success', 'تم الاضافة بنجاح');
    }


    public function edit($id)
    {
        $specialization = $this->model->show($id);
        return view("{$this->path}edit", ['item' => $specialization]);
    }


    public function update(BranchRequest $request, $id)
    {
        $this->model->update($request->validated(), $id);
        return redirect(route('admin.branches.index'))->with('success', 'تم التعديل بنجاح');
    }


    public function destroy($id)
    {
        $this->model->delete($id);
        return response()->json('success');
    }
}
