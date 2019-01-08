<?php

namespace App\Console;

use App\Events\RssCreatedEvent;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//        $schedule->command('emails:send --force')->daily();
        // 15. 每隔一分钟执行一次
        $schedule->call(function () {
            event(new RssCreatedEvent());
        })->everyMinute();
    }
}
