<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/12/012
 * Time: 16:50
 */

namespace App;

use Illuminate\Support\Facades\Auth;
use JeroenNoten\LaravelAdminLte\Menu\Builder;
use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;

/**
 * 菜单过滤器
 * Class MyMenuFilter
 * @package App
 */
class MenuFilter implements FilterInterface
{
    public function getQuery()
    {
        // TODO: Implement getQuery() method.
    }

    public function transform($item, Builder $builder)
    {
        $user = $this->getUser();
        if (Auth::id()  == 1){
            return $item;
        }
        if (isset($item['permission']) && !$user->hasPermissionTo($item['permission'])) {
            return false;
        }
        return $item;
    }

    public function getUser(): Admin
    {
        static $user;
        if ($user) {
            return $user;
        } else {
            $user = Admin::find(Auth::guard('admin')->id());
            return $user;
        }
    }
}