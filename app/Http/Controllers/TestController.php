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
//        event(new MessageEvent());
//        event(new NotificationsEvent());
//        event(new UserLogin());
//        event(new RssCreatedEvent());
        throw new \Exception('sentry 错误测试');
    }
}
