<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Http\Requests\Auth\ForgetPasswordRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\VerifyAccountRequest;
use App\Http\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    public function login(Request $request)
    {
        $request->validate(['user_info' => 'required|max:191', 'password' => 'required|max:191']);
        if (auth()->attempt(['email' => $request->user_info, 'password' => $request->password, 'is_active' => 1, 'role' => 'patient'], true) ||
            auth()->attempt(['phone' => $request->user_info, 'password' => $request->password, 'is_active' => 1, 'role' => 'patient'], true)) {
            return response_json(true, __('Successfully'));
        }
        return response_json(false, __('auth.failed'));
    }

    public function register(RegisterRequest $request)
    {
        $this->service->register($request->all());
        return response_json(true, 'Success');
    }

    public function verify(VerifyAccountRequest $request)
    {
        $user = $this->service->verifyAccount($request->all());
        if ($user) {
            if ($user->action_type == 'verify') auth()->login($user);
            return response_json(true, $user->action_type);
        }
        return response_json(false, __('The Code is incorrect'));
    }

    public function forgetPassword(ForgetPasswordRequest $request)
    {
        $this->service->forgetPassword($request->all());
        return response_json(true, __('Code is sent'));
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $this->service->changePassword($request->all());
        return response_json(true, __('Successfully'));
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }


}
