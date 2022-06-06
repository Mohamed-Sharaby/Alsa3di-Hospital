<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\SpecializationRequest;
use App\Models\Cart;
use App\Models\Category;
use App\Repositories\Repository;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $model;
    protected $path;

    public function __construct(Cart $cart)
    {
        $this->model = new Repository($cart);
        $this->path = 'dashboard.carts.';
    }


    public function index()
    {
        $carts = $this->model->getModel()->where('status', '<>', 'created')->latest()->get();
        return view("{$this->path}index", compact('carts'));
    }


    public function show($id)
    {
        $cart = $this->model->show($id);
        return view("{$this->path}show", compact('cart'));
    }


    public function edit($id)
    {
        $item = $this->model->show($id);
        return view("{$this->path}edit", compact('item'));
    }


    public function update(Request $request, Cart $cart)
    {
        $request->validate(['status' => 'required|in:new,waiting,confirmed,accepted,rejected,cancelled,finished']);
        $cart->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'تم تغيير الحالة بنجاح');
    }


    public function destroy($id)
    {
        $this->model->delete($id);
        return response()->json('success');
    }
}
