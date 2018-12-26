<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/8/008
 * Time: 14:50
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminBaseController extends Controller
{
    public function __construct()
    {
//        $this->middleware("auth");
    }
}