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
                'text' => 'User Manage',
                'icon' => 'users',
                'permission' => 'manage_users',
                'submenu' => [
                    [
                        'text' => 'Permissions',
                        'url' => 'admin/permissions',
                        'icon' => 'briefcase',
                    ],
                    [
                        'text' => 'Roles',
                        'url' => 'admin/roles',
                        'icon' => 'briefcase',
                    ],
                    [
                        'text' => 'Users',
                        'url' => 'admin/users',
                        'icon' => 'user',
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
