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
    const SUCCESS = 200;
    const FAIL = 0;

    public static function success($data)
    {
        return [
            'status_code' => self::SUCCESS,
            'data' => $data,
        ];
    }

    public static function error($message = '')
    {
        return [
            'status_code' => self::FAIL,
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