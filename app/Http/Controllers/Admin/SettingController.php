<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Repositories\Repository;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected $model;
    protected $path;

    public function __construct(Setting $setting)
    {
        $this->model = new Repository($setting);
        $this->path = 'dashboard.settings.';
    }



    public function index()
    {
        $pages = $this->model->all()->pluck('page')->unique();
        return view("{$this->path}index", compact('pages'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        foreach ($data as $key => $value) {
            if ($key == '_token' || !$value) continue;
            {
                if (is_array($value)) {
                    Setting::where(['name' => $key])->update(['ar_value' => $value[0], 'en_value' => $value[1]]);
                } else {
                    Setting::where(['name' => $key])->update(['ar_value' => $value, 'en_value' => $value]);
                }
            }
            if ($request->has('about_image')){
                $setting = Setting::whereName('about_image')->first();
                deleteImg($setting->ar_value);
                $image = uploadFile($data['about_image']);
                $setting->update(['ar_value' => $image, 'en_value' => $image]);
            }
        }

        return back()->with('success', 'تم التحديث بنجاح');
    }


    public function show($id)
    {
        $settings = Setting::wherePage($id)->get();
        $page = $id;
        return view("{$this->path}show",compact('settings', 'page'));
    }

}
