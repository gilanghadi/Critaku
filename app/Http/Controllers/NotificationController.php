<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Notification;
use App\Models\User;
use App\Notifications\CommentNotifications;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        return view('users.notification.index');
    }

    public function markread($id)
    {
        if ($id) {
            Notification::where('id', $id)->update(['read_at' => now()]);
            return back();
        }
        return back()->with('error', 'message error');
    }
}
