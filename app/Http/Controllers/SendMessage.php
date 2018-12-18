<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/17/017
 * Time: 19:58
 */

namespace App\Http\Controllers;


use App\HelpTrait\BroadcastHttpPush;

class SendMessage
{
    use BroadcastHttpPush;

    public function index()
    {
        $broadcastChannel = array(
            "channel" => "private-Message",   // 通道名，`private-`表示私有
            "name" => "sayHello",    // 事件名
            "data" => array(
                "status" => 200,
                "message" => "hello world!"
            )
        );
        $this->push($broadcastChannel);
    }
}