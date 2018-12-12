<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/12/012
 * Time: 18:13
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class User extends Model
{
    use HasRoles;

    protected $guard_name = 'web';

    public function add()
    {
        $user = new User();
        $user = $user->find(1);

        $user->assignRole('Founder');
//        $role = Role::create(['name' => 'Founder']);
// 清除缓存
//        app()['cache']->forget('spatie.permission.cache');

        // 先创建权限
//        Permission::create(['name' => 'manage_contents']);
//        Permission::create(['name' => 'manage_users']);
//        Permission::create(['name' => 'edit_settings']);

        // 创建站长角色，并赋予权限
//        $founder = Role::create(['name' => 'Founder']);
//        $founder->givePermissionTo('manage_contents');
//        $founder->givePermissionTo('manage_users');
//        $founder->givePermissionTo('edit_settings');

        // 创建管理员角色，并赋予权限
//        $maintainer = Role::create(['name' => 'Maintainer']);
//        $maintainer->givePermissionTo('manage_contents');

    }

}