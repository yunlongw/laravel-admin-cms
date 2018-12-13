<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/12/012
 * Time: 16:50
 */

namespace App;

use JeroenNoten\LaravelAdminLte\Menu\Builder;
use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;

/**
 * 菜单过滤器
 * Class MyMenuFilter
 * @package App
 */
class MyMenuFilter implements FilterInterface
{
    public function getQuery()
    {
        // TODO: Implement getQuery() method.
    }

    public function transform($item, Builder $builder)
    {
        $user = \App\Models\User::find(\Auth::id());
        $permissions =  $user->permissions;
        $getAllPermissions = $user->getAllPermissions();
        if (isset($item['permission'])){
          if (!$b = $user->hasPermissionTo($item['permission'])){
              return false;
          }
        }

        return $item;
    }
}