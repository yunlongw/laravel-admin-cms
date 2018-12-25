<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/8/008
 * Time: 15:01
 */

namespace App\Http\Controllers\Admin;


class IndexController extends AdminBaseController
{
    public function index()
    {
        return view("admin.dashboard");
    }
}