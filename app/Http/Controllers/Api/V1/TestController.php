<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/22/022
 * Time: 13:01
 */

namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\Api\BaseController;
use App\Traits\UdpLogTrait;

/**
 * Class TestController
 * @package App\Http\Controllers\Api\V1
 */
class TestController extends BaseController
{
    use UdpLogTrait;

    public function index()
    {
        $this->write('111',  'asdfsf' );
        return json_encode(
            ['code' => 200]
        );
    }
}
