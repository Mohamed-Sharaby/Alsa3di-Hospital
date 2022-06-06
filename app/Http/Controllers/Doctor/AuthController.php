<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    protected $redirectTo = 'doctor-control/main';

    public function login()
    {
        return view('doctors.auth.login');
    }

    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }


    public function postLogin(Request $request)
    {
        $credentials = $request->validate(['email' => 'required|email', 'password' => 'required']);
        $credentials['role'] = 'doctor';
        $credentials['is_active'] = true;
        if (auth('web')->attempt($credentials)) {
            return redirect()->intended($this->redirectTo);
        }
        return back()->with('error', 'البيانات المدخلة غير صحيحة');
    }

    public function logout()
    {
        auth('web')->logout();
        return redirect(route('general'));
    }

}
