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
        $user = \App\Models\User::find(1);
        if (isset($item['permission']) && $user->assignRole($item['permission'])) {
            return false;
        }

        return $item;
    }
}