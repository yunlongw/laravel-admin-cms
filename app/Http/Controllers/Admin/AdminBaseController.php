<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/8/008
 * Time: 14:50
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\ValidationTrait;

class AdminBaseController extends Controller
{
    use ValidationTrait;

    public function __construct()
    {
        $this->middleware("auth:admin");
    }
}
