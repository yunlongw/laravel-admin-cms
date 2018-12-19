<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/19/019
 * Time: 13:26
 */

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SendMsgEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    protected $message;

    public function __construct($msg)
    {
        $this->message = $msg;
    }

    public function broadcastOn()
    {
        return new Channel("everyone");
    }

}