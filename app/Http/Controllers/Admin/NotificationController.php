<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\GeneralNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{

    public function index()
    {
        return view('dashboard.notifications.index', ['notifications' => DatabaseNotification::where('notifiable_type','App\Models\User')->latest()->paginate(12)]);
    }


    public function create()
    {
        $users = User::whereIsActive(1)->get();
        return view('dashboard.notifications.create', compact('users'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'users' => 'required|array',
            'title' => 'required',
            'body' => 'required',
        ]);
        $data = $request->except('_token');
        $users = User::whereIn('id', $data['users'])->get();
        Notification::send($users, new GeneralNotification([
            'title' => $data['title'],
            'body' => $data['body'],
        ]));

        return redirect()->route('admin.notifications.index')->with('success', 'تم ارسال الاشعار بنجاح');
    }


    public function destroy($id)
    {
        $notification = DatabaseNotification::findOrFail($id);
        $notification->delete();
        return 'Done';
    }

}
