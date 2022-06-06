<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationCollection;
use App\Http\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    use ApiResponses;

    public function index()
    {
        $user = auth('api')->user();
        $notifications = $user->notifications()->paginate($this->paginateNumber);
        $user->unreadNotifications->markAsRead();
        return $this->apiResponse(new NotificationCollection($notifications));
    }

    public function count()
    {
        $user = auth('api')->user();
        $count = $user->unreadNotifications()->count();
        return $this->apiResponse($count);
    }

    public function destroy($id)
    {
        $notification = DatabaseNotification::findOrFail($id);
        $notification->delete();
        return $this->apiResponse(__('Deleted Successfully'));
    }
}
