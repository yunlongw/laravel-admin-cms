<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/12/012
 * Time: 18:59
 */

namespace App\Http\Controllers\Admin;


use App\User;

class UserController extends AdminBaseController
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
}