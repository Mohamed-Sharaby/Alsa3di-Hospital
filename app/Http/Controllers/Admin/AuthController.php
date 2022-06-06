<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Scope\ActiveScope;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function showGeneralLoginPage()
    {
        return view('dashboard.auth.general-login');
    }

    public function login()
    {
        return view('dashboard.auth.login');
    }

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }


    public function postLogin(Request $request)
    {
        $credentials = $request->validate(['email' => 'required|email', 'password' => 'required']);
        $credentials['is_active'] = true;
        if (auth('admin')->attempt($credentials)) {
            return redirect(route('admin.main'));
        }
        return back()->with('error', 'البيانات المدخلة غير صحيحة');
    }

    public function logout()
    {
        auth('admin')->logout();
        return redirect(route('general'));
    }

}
