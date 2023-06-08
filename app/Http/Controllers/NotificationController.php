<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NotificationController extends Controller
{
    public function readNotification(string $id)
    {
        $notification=Auth::user()->notifications->where('id',$id)->first();
        $notification->markAsRead();
        return redirect()->back();
    }

    public function readAllNotification()
    {
        $user=User::find(Auth::id());
        $user->unreadNotifications()->update(['read_at' => now()]);
        return redirect()->back();
    }
}