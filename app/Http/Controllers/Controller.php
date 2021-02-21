<?php

namespace App\Http\Controllers;

use App\Models\MyEvent;
use App\Notifications\NewsNotification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function post_to_fb()
    {
        $event = new MyEvent();
        $event->notify(new NewsNotification());
    }
}
