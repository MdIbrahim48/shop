<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function checkNotification(){
        $notification = Notification::where('notification',0)->update([
            'notification' => 1
        ]);
        $collection = Notification::latest()->get();
        return view('backend.notification.notification',[
            'collection' => $notification
        ]);
    }
}
