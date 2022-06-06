<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Models\User;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    protected $model;
    protected $path;

    public function __construct(Admin $admin)
    {
        $this->model = new Repository($admin);
        $this->path = 'dashboard.admins.';
    }


    public function index()
    {
        $items = $this->model->all();
        return view("{$this->path}index", compact('items'));
    }


    public function create()
    {
        $superAdminRole = Role::whereName('Super Admin')->first();
        $roles = Role::where('id','!=',$superAdminRole->id)->where('is_active', '1')->get()->pluck('name','id');
        return view("{$this->path}create",compact('roles'));
    }


    public function store(AdminRequest $request)
    {
        $validator = $request->validated();
        $validator['is_active'] = 1;

        $roles = $validator['roles'] ?? [];
        unset($validator['roles']);

        $admin = $this->model->create($validator);
        $admin->syncRoles($roles);
        return redirect(route('admin.admins.index'))->with('success', 'تم الاضافة بنجاح');
    }


//    public function show($id)
//    {
//        return response()->json($this->model->show($id));
//    }


    public function edit(Admin $admin)
    {
        return view("{$this->path}edit", [
            'admin' => $admin,
            'roles' => Role::get()->pluck('name','id')
        ]);
    }


    public function update(AdminRequest $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $validator = $request->validated();

        $roles = $validator['roles'] ?? [];
        unset($validator['roles']);

        $admin->syncRoles($roles);
        $admin->update($validator);
        return redirect(route('admin.admins.index'))->with('success', 'تم التعديل بنجاح');
    }


    public function destroy($id)
    {
        $this->model->delete($id);
        return response()->json('success');
    }

}
