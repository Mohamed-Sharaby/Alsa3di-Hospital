<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiResponses;
use App\Models\City;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\Slider;
use App\Http\Services\HomeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use ApiResponses;

    protected $service;

    public function __construct(HomeService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        return $this->apiResponse($this->service->handle($request->all()));
    }

    public function sliders()
    {
        $sliders = Slider::whereType('mobile')->latest()->limit(3)->get()->transform(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->title,
                'content' => $item->details,
                'image' => $item->image_path,
            ];
        });
        return $this->apiResponse($sliders);
    }

    public function cities()
    {
        $sliders = City::get()->transform(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
            ];
        });
        return $this->apiResponse($sliders);
    }

    public function settings($name)
    {
        return $this->apiResponse(getSetting($name));
    }

    public function contactUs()
    {
        $data = [];
        Setting::whereIn('name', ['phone', 'email', 'address', 'lat', 'lng'])->get()->each(function($setting) use (&$data){
            $data[$setting->name] = $setting->value;
        });
        return $this->apiResponse($data);
    }

    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:191',
            'phone' => 'required|numeric|digits:12|starts_with:966',
            'email' => 'required|string|max:191|email',
            'message' => 'required|string'
        ]);
        Contact::create($request->all());
        return $this->apiResponse(__('Created Successfully'));
    }

    public function aboutUs()
    {
        return $this->apiResponse($this->service->about());
    }
}
