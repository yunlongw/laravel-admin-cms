<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/8/008
 * Time: 15:02
 */

namespace App\Http\Controllers\Api;


use App\Events\OrderShipped;
use App\Events\UserLogin;
use App\Models\Flights;

class IndexController extends ApiBaseController
{
    public function index()
    {
        $data = ['code' => 200, 'message' => "this is api index"];
        $data = json_encode($data);
        return $data;
    }

    public function event()
    {
        $flights = Flights::find(1);
        event(new OrderShipped($flights));

        event(new UserLogin());
        var_dump('event an listeners');
    }
}