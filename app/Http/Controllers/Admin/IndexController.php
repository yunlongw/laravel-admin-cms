<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/8/008
 * Time: 15:01
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class IndexController extends AdminBaseController
{
    public function index(Request $request)
    {
        return view("admin.index");
    }

    public function dashboard()
    {
        return view("admin.dashboard");
    }
}