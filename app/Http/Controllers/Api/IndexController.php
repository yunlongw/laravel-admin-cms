<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/8/008
 * Time: 15:02
 */

namespace App\Http\Controllers\Api;



class IndexController extends BaseController
{

    public function index()
    {
        return $this->response->array([]);
    }

}