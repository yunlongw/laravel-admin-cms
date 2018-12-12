<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     * php artisan event::generate 定义事件和监听器后，可以用此命令生成对应的监听器
     * @var array
     */
    protected $listen = [
//        Registered::class => [
//            SendEmailVerificationNotification::class,
//        ],
        'App\Events\OrderShipped' => [
            'App\Listeners\SendShipmentNotification',
            'App\Listeners\DoSomething1',
        ],
        'App\Events\UserLogin' => [

            'App\Listeners\Dosomething2',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

//        Event::listen('event.*', function ($foo, $bar) {
//            //
//        });
    }
}
