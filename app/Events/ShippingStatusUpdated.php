<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/18/018
 * Time: 19:22
 */

namespace App\Events;


use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ShippingStatusUpdated implements ShouldBroadcast
{
    public $update;

    public function broadcastOn()
    {
        // TODO: Implement broadcastOn() method.
        return new PrivateChannel('order.'.$this->update->order_id);
    }

}