<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Repositories\Repository;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $model;
    protected $path;

    public function __construct(Contact $contact)
    {
        $this->model = new Repository($contact);
        $this->path = 'dashboard.contacts.';
    }


    public function index()
    {
        $items = $this->model->all();
        return view("{$this->path}index", compact('items'));
    }

    public function edit($id)
    {
        $this->model->update(['is_read' => 1], $id);
        return back()->with('success', 'تم التعديل بنجاح');
    }

    public function destroy($id)
    {
        $this->model->delete($id);
        return response()->json('success');
    }
}
