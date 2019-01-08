<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/1/001
 * Time: 16:47
 */

namespace App\Http\Controllers\Api\V2;


use App\Http\Controllers\Api\V1\UserController as V1;
use App\User;


/**
 * 用户资源标识
 * @Resource("Users", uri="/users")
 */
class UserController extends V1
{
    public function show($id)
    {
        $user = User::findOrFail($id);

        return $this->response->array($user->getData());
    }

    public function index()
    {
        $users = User::all();
        return $this->response->array($users->all());
    }



}