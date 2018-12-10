<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/10/010
 * Time: 13:08
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Flights extends Model
{
    public function getRouteKeyName() {
        return 'name';  // 以任务名称作为路由模型绑定查询字段
    }
}