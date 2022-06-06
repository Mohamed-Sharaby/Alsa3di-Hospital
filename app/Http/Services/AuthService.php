<?php

namespace App\Http\Services;

use App\Http\Requests\RegisterRequest;
use App\Http\Services\Facade\Sms;
use App\Http\Services\Repository\UserRepository;
use Illuminate\Http\Request;

class AuthService
{
    public $user;

    public function __construct(UserRepository $userRepository)
    {
        $this->user = $userRepository;
    }

    public function register($data)
    {
        $code = 1234; //rand(1000, 9999);
        $data['is_active'] = 0;
        $data['verify_code'] = $code;
        $user = $this->user->create($data);
        $this->sendVerifyCode($data['phone'], $code);
        return $user;
    }


    public function sendVerifyCode($phone, $code) : void
    {
        //Sms::send($phone, "مرحبا ، كود التعفيل الخاص بك هو : {$code}");
    }

    public function verifyAccount($data)
    {
        $user = $this->user->getModel()->wherePhone($data['phone'])->whereVerifyCode($data['code'])->first();
        if ($user) {
            if ($user->is_active == 1) {
                $type = 'forget';
            } else {
                $type = 'verify';
            }
            $user->update(['is_active' => 1, 'verify_code' => null]);
            $user['action_type'] = $type;
        }
        return $user;
    }

    public function forgetPassword($data)
    {
        $code = 1234; //rand(1000, 9999);
        $user = $this->user->getModel()->whereRole('patient')->wherePhone($data['phone'])->first();
        $user->update(['verify_code' => $code]);
        $this->sendVerifyCode($data['phone'], $code);
        return $user;
    }

    public function changePassword($data)
    {
        $user = $this->user->getModel()->wherePhone($data['phone'])->first();
        $user->update(['password' => $data['password']]);
        return $user;
    }

    public function getModel()
    {
        return $this->user->getModel();
    }

    public function logout()
    {
        auth('api')->user()->update(['fcm_token' => null]);
        auth('api')->logout();
        return true;
    }
}