<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Illuminate\Contracts\Events\Dispatcher;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add('MAIN NAVIGATION');
            $event->menu->add([
                'text' => 'Blog',
                'url' => '#',
//                'can'  => 'manage-blog',
            ]);
            $event->menu->add([
                'text' => 'Pages',
                'url' => '#',
                'icon' => 'file',
                'label' => 4,
                'label_color' => 'success',
            ]);

            $event->menu->add('ACCOUNT SETTINGS');
            $event->menu->add([
                'text' => 'Profile',
                'url' => '#',
                'icon' => 'user',
                'permission' => 'edit_settings'
            ]);
            $event->menu->add([
                'text' => 'UserList',
                'url' => 'admin/users',
                'icon' => 'users',
                'permission' => 'manage_users'
            ]);
            $event->menu->add([
                'text' => 'Change Password',
                'url' => '#',
                'icon' => 'lock',
            ]);
            $event->menu->add([
                'text' => 'Multilevel',
                'icon' => 'share',
                'submenu' => [
                    [
                        'text' => 'Level One',
                        'url' => '#',
                    ],
                    [
                        'text' => 'Level One',
                        'url' => '#',
                        'submenu' => [
                            [
                                'text' => 'Level Two',
                                'url' => '#',
                            ],
                            [
                                'text' => 'Level Two',
                                'url' => '#',
                                'submenu' => [
                                    [
                                        'text' => 'Level Three',
                                        'url' => '#',
                                    ],
                                    [
                                        'text' => 'Level Three',
                                        'url' => '#',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'text' => 'Level One',
                        'url' => '#',
                    ],
                ],
            ]);
            $event->menu->add("LABELS");
            $event->menu->add([
                'text' => 'Important',
                'icon_color' => 'red',
            ]);
            $event->menu->add([
                'text' => 'Warning',
                'icon_color' => 'yellow',
            ]);
            $event->menu->add([
                'text' => 'Information',
                'icon_color' => 'aqua',
            ]);


        });
    }
}
