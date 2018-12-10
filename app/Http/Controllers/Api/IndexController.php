<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/8/008
 * Time: 15:02
 */

namespace App\Http\Controllers\Api;


class IndexController extends ApiBaseController
{
    public function index()
    {
        $data = ['code' => 200, 'message' => "this is api index"];
        $data = json_encode($data);
        return $data;
    }
}