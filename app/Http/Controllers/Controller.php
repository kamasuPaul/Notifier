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
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function post_to_fb(Request $request)
    {
        $post = (object)[];
    
        $post_text = $request->input('post_text');
        $post_image_url = $request->input('post_image_url');
        $post->post_text = $post_text;
        $post->post_image_url = $request->input('post_image_url');
        $post->link = $request->input('link');
        $post->link_text = $request->input('link_text');
        $event = new MyEvent();
        $event->notify(new NewsNotification($post));
    }
}
