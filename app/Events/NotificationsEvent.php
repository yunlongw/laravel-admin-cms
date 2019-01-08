<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/8/008
 * Time: 18:13
 */

namespace App\Events;

use Carbon\Carbon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NotificationsEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct()
    {
        //
    }

    public function broadcastOn()
    {
        return new Channel('rss');
    }


    public function broadcastWith()
    {
        // 返回当前时间
        $b = false;
        return [
            'name' => 'notify',
            'message' => Carbon::now()->toDateTimeString()
        ];
    }

}