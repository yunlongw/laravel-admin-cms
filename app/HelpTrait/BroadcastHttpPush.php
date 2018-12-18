<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/17/017
 * Time: 19:57
 */

namespace App\HelpTrait;

use GuzzleHttp\Client;


trait BroadcastHttpPush
{
    public function push($data)
    {
        $baseUrl = env('WEBSOCKET_BASEURL', 'http://localhost:6001/');
        $appId = env('WEBSOCKET_APPID', '85b345122e7793f5');
        $key = env('WEBSOCKET_KEY', '7c0be63b2083eda62c8c3a799fbb93f7');
        $httpUrl = $baseUrl . 'apps/' . $appId . '/events?auth_key=' . $key;

        $client = new Client([
            'base_uri' => $httpUrl,
            'timeout' => 2.0,
        ]);
        $response = $client->post($httpUrl, [
            'json' => $data
        ]);
        $code = $response->getStatusCode();
    }
}