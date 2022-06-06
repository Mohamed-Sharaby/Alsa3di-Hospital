<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $data['address'] = getSetting('address');
        $data['phone'] = getSetting('phone');
        $data['email'] = getSetting('email');
        $data['lat'] = getSetting('lat');
        $data['lng'] = getSetting('lng');
        return inertia('Contact/Index', $data);
    }

    public function store(ContactRequest $request)
    {
        //dd($request->all());
        Contact::create($request->all());
        return redirect('/')->with('success', __('Added Successfully'));
    }
}
