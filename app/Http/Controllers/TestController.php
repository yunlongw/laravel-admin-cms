<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/20/020
 * Time: 14:31
 */

namespace App\Http\Controllers;


use App\Events\MessageEvent;
use App\Events\NotificationsEvent;
use App\Events\RssCreatedEvent;
use App\Events\UserLogin;
use Illuminate\Container\Container;

class TestController extends Container
{
    public function index()
    {
        echo "这是一个测试控制器";
    }

    public function socketio()
    {
        event(new MessageEvent());
        event(new NotificationsEvent());
        event(new UserLogin());
        event(new RssCreatedEvent());
    }

    public function sentry()
    {
        throw new \Exception('sentry 错误测试');
    }
}
