<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
| 定义在 routes/api.php 文件中的路由通过 app/Providers/RouteServiceProvider 的处理
| 被嵌套在一个路由群组中， 在这个群组中，所有路由会被自动添加 /api 前缀，所以你不需要
| 再到路由文件中为每个路由手动添加，你可以通过编辑 RouteServiceProvider 类来修改路由前
| 缀以及其他的路由群组选项：
*/

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ['namespace' => 'App\Http\Controllers\Api\V1'], function ($api) {
    $api->post('user/index', 'UserController@index');
    $api->post('index/index', 'IndexController@index');
    $api->post('user/register', 'UserController@register');
    $api->post('user/login', 'UserController@login');
    $api->post('user/logout', 'UserController@logout');
    $api->post('user/refresh', 'UserController@refresh');
    $api->post('user/me', 'UserController@me');
});

$api->version('v2', ['namespace' => 'App\Http\Controllers\Api\V2'], function ($api) {
    $api->post('user/index', 'UserController@index');
    $api->post('index/index', 'IndexController@index');
});
