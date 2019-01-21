<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/26/026
 * Time: 17:57
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Illuminate\Contracts\Events\Dispatcher;

/**
 * 菜单服务
 * Class MenuServiceProvider
 * @package App\Providers
 */
class MenuServiceProvider extends ServiceProvider
{
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add('MAIN NAVIGATION');
            $event->menu->add([
                'text' => 'dashboard',
                'url' => 'admin/dashboard',
                'label' => 4,
                'icon' => 'dashboard',
                'label_color' => 'success',
            ]);


            $event->menu->add('ACCOUNT SETTINGS');
            $event->menu->add([
                'text' => 'User Manage',
                'icon' => 'users',
                'permission' => 'manage_users',
                'icon_color' => 'red',
                'submenu' => [
                    [
                        'text' => 'Permissions',
                        'url' => 'admin/permissions',
                        'permission' => 'manage_permissions',

                    ],
                    [
                        'text' => 'Roles',
                        'url' => 'admin/roles',
                        'permission' => 'manage_roles',

                    ],
                    [
                        'text' => 'Users',
                        'url' => 'admin/users',
                        'permission' => 'manage_users',

                    ],
                ],
            ]);

            $event->menu->add([
                'text' => 'Api Manage',
                'icon_color' => 'blue',
                'submenu' => [
                    [
                        'text' => 'Api List',
                        'url' => 'admin/apis',
                    ],
                    [
                        'text' => 'Android Issue',
                        'url' => 'admin/android',
                    ],
                    [
                        'text' => 'Ios Issue',
                        'url' => 'admin/ios',
                    ],
                ],

            ]);
            $event->menu->add("LABELS");
            $event->menu->add([
                'text' => 'Logs',
                'icon' => 'calendar',
                'url' => 'admin/logs',
                'icon_color' => 'yellow',
            ]);

        });
    }

}
