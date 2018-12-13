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

//        $user->assignRole('Founder');
//        $user->givePermissionTo('manage_users');
    }

}