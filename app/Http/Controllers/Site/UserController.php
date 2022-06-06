<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Attach;
use App\Models\Cart;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile()
    {
        return inertia('User/Index');
    }

    public function reservations()
    {
        $reservations = auth()->user()->reservations()->with(['doctor.user', 'appointment', 'specialization'])->whereType('appointment')->latest()->paginate(20);
        return inertia('User/Reservations', ['items' => $reservations]);
    }

    public function orders()
    {
        $data['items'] = auth()->user()->reservations()->with(['doctor.user', 'specialization'])->whereType('consult')->latest()->paginate(20);
        return inertia('User/Orders', $data);
    }

    public function carts()
    {
        $data['items'] = auth()->user()->carts()->with(['items.product'])->where('status', '<>', 'created')->latest()->paginate(20);
        return inertia('User/Carts', $data);
    }

    public function cart(Cart $cart)
    {
        $cart->load(['user', 'items.product.subCategory', 'area', 'city']);
        $data['cart'] = $cart;
        return inertia('User/Cart', $data);
    }

    public function medicalFile()
    {
        //$items = Attach::whereHasMorph('attachable', [Reservation::class], function ($q) {
        //    $q->where('user_id', auth()->id());
        //})->with(['attachable.doctor.user', 'attachable.specialization'])->paginate(20);
        $items = Reservation::whereHas('files')
                            ->with(['user', 'specialization', 'doctor.user', 'files'])->whereUserId(auth()->id())->paginate(20);
        return inertia('User/MedicalFile', ['items' => $items]);
    }

    public function changePassword()
    {
        return inertia('User/Password');
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'name' => 'required|max:191|string',
            'phone' => 'required|numeric|phone:EG,SA|unique:users,phone,'.$user->id,
            'email' => 'required|email|max:191|unique:users,email,'.$user->id,
        ]);
        $user->update($request->all());
        return response_json(true, __('Updated Successfully'));
    }

    public function updatePassword(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'old_password' => 'required|max:191|string',
            'password' => 'required|min:6|confirmed|max:191',
            'password_confirmation' => 'required|max:191',
        ]);
        if (!Hash::check($request->old_password, $user->password)) {
            return response_json(false, __('Old Password Wrong'));
        }
        $user->update($request->all());
        return response_json(true, __('Updated Successfully'));
    }

}
