<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/1/001
 * Time: 16:41
 */

namespace App\Http\Controllers\Api;


class Response
{
    public static function success($data)
    {
        return [
            'status_code' => 200,
            'data' => $data,
        ];
    }

    public static function error($message = '')
    {
        return [
            'status_code' => 0,
            'message' => $message,
        ];
    }

    public static function return($statusCode, $message, $data = [])
    {
        return [
            'status_code' => $statusCode,
            'message' => $message,
            'data' => $data,
        ];
    }

}