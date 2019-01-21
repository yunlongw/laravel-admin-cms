<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/21/021
 * Time: 18:04
 */

namespace App\Http\Controllers\Admin;

use  \Rap2hpoutre\LaravelLogViewer\LogViewerController as  LogsViewerController;


class LogViewerController extends LogsViewerController
{
    public function __construct()
    {
        $this->middleware("auth:admin");
        parent::__construct();
    }
}
