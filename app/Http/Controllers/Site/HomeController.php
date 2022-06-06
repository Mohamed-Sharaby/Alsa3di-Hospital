<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Resources\BranchResource;
use App\Models\About;
use App\Models\Branch;
use App\Models\Doctor;
use App\Models\EmailSubscribe;
use App\Models\News;
use App\Models\Offer;
use App\Models\Slider;
use App\Models\Specialization;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['sliders'] = Slider::latest()->whereType('site')->limit(4)->get()->map(fn ($item) => [
            'title' => $item->title, 'image' => $item->image_path
        ]);
        $data['specializations'] = Specialization::limit(4)->get();
        $data['about'] = About::withoutGlobalScopes()->first();
        $data['distinct_doctors'] = Doctor::with('user')->limit(6)->inRandomOrder()->whereIsDistinct(1)->get();
        $data['about_video'] = getSetting('about_video') ?? '';
        $data['about_image'] = getImg(getSetting('about_image')) ?? '';
        $data['news'] = News::latest()->limit(3)->get();
        $data['offers'] = Offer::latest()->limit(3)->get();
        return inertia('Index', $data);
    }

    public function about()
    {
        $item = About::withoutGlobalScopes()->first();
        return inertia('About/Index', ['item' => $item]);
    }

    public function branch(Branch $branch)
    {
        $branch->load(['images', 'distinct_doctors.user']);
        $branch->doctors = $branch->distinct_doctors()->with('user')->limit(4)->get()->map(function ($doctor) {
            return [
                'id' => $doctor->id,
                'image' => $doctor->user->image_path,
                'name' => $doctor->user->name,
                'job' => $doctor->job
            ];
        });
        return inertia('Branch/Index', ['item' => $branch]);
    }

    public function page($page)
    {
        $item = getSetting($page);
        return inertia(ucfirst($page), ['item' => $item]);
    }

    public function subscribeToNewsletter(Request $request)
    {
        $request->validate(['subscribe_email' => 'required|email|unique:email_subscribes,email']);
        EmailSubscribe::create(['email' => $request->subscribe_email]);
        return response()->json(['status' => true, 'data' => __('Successfully subscribed')]);
    }
}
