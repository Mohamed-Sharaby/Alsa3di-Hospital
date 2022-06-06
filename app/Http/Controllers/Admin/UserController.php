<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Branch;
use App\Models\Specialization;
use App\Models\User;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected $model;
    protected $path;

    public function __construct(User $user)
    {
        $this->model = new Repository($user);
        $this->path = 'dashboard.users.';
    }



    public function index()
    {
        $items = $this->model->getModel()->where('role','patient')->get();
        return view("{$this->path}index", compact('items'));
    }



    public function create()
    {
        return view("{$this->path}create",[
            'branches' => Branch::pluck('ar_name', 'id'),
            'specializations' => Specialization::pluck('ar_name', 'id')
        ]);
    }



    public function store(UserRequest $request)
    {
        $this->model->create($request->validated());
        return redirect(route('admin.users.index'))->with('success', 'تم الاضافة بنجاح');
    }


    public function show($id)
    {
        return response()->json($this->model->show($id));
    }


    public function edit($id)
    {
        $user = $this->model->show($id);
        return view("{$this->path}edit", compact('user'));
    }


    public function update(UserRequest $request, $id)
    {
        $this->model->update($request->validated(), $id);
        return redirect(route('admin.users.index'))->with('success', 'تم التعديل بنجاح');
    }


    public function destroy($id)
    {
        $this->model->delete($id);
        return response()->json('success');
    }
}
