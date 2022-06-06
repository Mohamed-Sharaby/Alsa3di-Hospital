<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ChangePasswordRequest;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\UpdateProfileRequest;
use App\Http\Requests\Api\VerifyUserRequest;
use App\Http\Requests\Auth\ForgetPasswordRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\MedicalFileCollection;
use App\Http\Resources\UserResource;
use App\Http\Services\AuthService;
use App\Http\Traits\ApiResponses;
use App\Models\Attach;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use ApiResponses;

    protected $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;
        $this->middleware('auth:api', ['only' => ['updateProfile', 'logout', 'changeLang']]);
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->service->register($request->all());
        return $this->apiResponse(['code' => $user->verify_code]);
    }

    public function login(LoginRequest $request)
    {
        $user = $this->service->getModel()->whereRole('patient')->where(function ($q) use ($request) {
            $q->where('phone', $request->username)->orWhere('email', $request->username);
        })->first();
        if ($user && Hash::check($request->password, $user->password)) {
            $token = auth('api')->login($user);
            return $this->respondWithToken($token);
        }
        return $this->apiResponse(__('Credentials Failed'), 401);
    }

    public function logout()
    {
        $this->service->logout();
        return $this->apiResponse(__('Successfully logged out'));
    }

    public function verifyUser(VerifyUserRequest $request)
    {
        $user = $this->service->verifyAccount($request->all());
        if ($user) {
            if ($user['action_type'] == 'forget') {
                return $this->apiResponse(__('Code is correct'));
            }
            $token = auth('api')->login($user);
            return $this->respondWithToken($token);
        }
        return $this->apiResponse(__('Code is incorrect'), 402);
    }

    public function forgetPassword(ForgetPasswordRequest $request)
    {
        $user = $this->service->forgetPassword($request->all());
        return $this->apiResponse(['code' => $user->verify_code]);
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $this->service->changePassword($request->all());
        return $this->apiResponse(__('Successfully'));
    }

    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    protected function respondWithToken($token)
    {
        $user = auth('api')->user();
        $user->update(['fcm_token' => \request('fcm_token')]);
        $user['token'] = $token;
        return $this->apiResponse(new UserResource($user));
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = auth('api')->user();
        $user->update($request->all());
        $user['token'] = auth('api')->tokenById($user->id);
        return $this->apiResponse(new UserResource($user));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|min:6|max:191',
            'password' => 'required|min:6|max:191'
        ]);
        $user = auth('api')->user();
        if (Hash::check($request->old_password, $user->password)) {
            $user->update(['password' => $request->password]);
            return $this->refresh();
        }
        return $this->apiResponse(__('Old Password is incorrect'), 402);
    }

    public function changeLang(Request $request)
    {
        $request->validate(['lang' => 'required|in:ar,en']);
        auth('api')->user()->update(['lang' => $request->lang]);
        return $this->apiResponse(__('Successfully'));
    }

    public function medicalFile()
    {
        //$items = Attach::whereHasMorph('attachable', [Reservation::class], function ($q) {
        //    $q->where('user_id', auth('api')->id());
        //})->with(['attachable.doctor.user', 'attachable.specialization'])->paginate(20);
        $items = Reservation::whereHas('files')
                            ->with(['user', 'specialization', 'doctor.user'])->whereUserId(auth('api')->id())->paginate(20);
        return $this->apiResponse(new MedicalFileCollection($items));
    }
}
