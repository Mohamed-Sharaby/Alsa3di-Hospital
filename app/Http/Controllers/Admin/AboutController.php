<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\About;
use App\Models\Branch;
use App\Models\Specialization;
use App\Models\User;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    protected $model;
    protected $path;

    public function __construct(About $about)
    {
        $this->model = new Repository($about);
        $this->path = 'dashboard.abouts.';
    }



    public function index()
    {
        $item = $this->model->getModel()->first();
        return view("{$this->path}index", compact('item'));
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'ar_title' => 'required|string',
            'en_title' => 'required|string',
            'ar_details' => 'required|string',
            'en_details' => 'required|string',
            'ar_author' => 'required|string',
            'en_author' => 'required|string',
            'ar_job' => 'required|string',
            'en_job' => 'required|string',
            'ar_author_details' => 'required|string',
            'en_author_details' => 'required|string',
            'ar_vision' => 'required|string',
            'en_vision' => 'required|string',
            'ar_message' => 'required|string',
            'en_message' => 'required|string',
            'ar_goals' => 'required|string',
            'en_goals' => 'required|string',
            'ar_brief' => 'required|string',
            'en_brief' => 'required|string',
            'image' => 'sometimes|image',
        ]);
        $this->model->update($request->all(), $id);
        return redirect(route('admin.abouts.index'))->with('success', 'تم التعديل بنجاح');
    }



}
