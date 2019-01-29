<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/18/018
 * Time: 19:25
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function member()
    {
        return $this->belongsTo("App\Http\Controllers\Api\Model\Member", 'id', 'uid');
    }
}
