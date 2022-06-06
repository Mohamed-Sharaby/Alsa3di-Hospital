<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\EmailSubscribe;
use App\Repositories\Repository;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    protected $model;
    protected $path;

    public function __construct(EmailSubscribe $emailSubscribe)
    {
        $this->model = new Repository($emailSubscribe);
        $this->path = 'dashboard.email-subscribes.';
    }


    public function index()
    {
        $items = $this->model->all();
        return view("{$this->path}index", compact('items'));
    }


    public function destroy($id)
    {
        $this->model->delete($id);
        return response()->json('success');
    }
}
