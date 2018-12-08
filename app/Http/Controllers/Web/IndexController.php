<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/8/008
 * Time: 14:47
 */

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return "hello world";
    }
}