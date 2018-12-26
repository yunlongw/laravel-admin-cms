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
                        'permission' => 'manage_permissions',

                    ],
                    [
                        'text' => 'Roles',
                        'url' => 'admin/roles',
                        'icon' => 'briefcase',
                        'permission' => 'manage_roles',

                    ],
                    [
                        'text' => 'Users',
                        'url' => 'admin/users',
                        'icon' => 'user',
                        'permission' => 'manage_users',

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