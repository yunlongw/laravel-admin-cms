<?php

namespace App\Events;

use Carbon\Carbon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class RssCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
//        return new PrivateChannel('channel-name');
        // 14. 创建频道
        return new Channel('rss');
    }

    /**
     * 指定广播数据。
     *
     * @return array
     */
    public function broadcastWith()
    {
        // 返回当前时间
        return ['name' => Carbon::now()->toDateTimeString()];
    }


}
