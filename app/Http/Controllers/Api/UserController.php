<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/1/001
 * Time: 16:47
 */

namespace App\Http\Controllers\Api;

use App\User;


class UserController extends BaseController
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