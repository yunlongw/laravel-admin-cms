<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/8/008
 * Time: 15:58
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getLogin()
    {
        return "login page";
    }

    public function postLogin()
    {
        return "post login";
    }

    public function getLoginOut()
    {
        return "login out";
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $title =  $request->get('title');
//        $request->input();
//        $request->post();

        var_dump($request->session());
        var_dump($request->cookie());
        return "get params title values : {$title}";

    }
}