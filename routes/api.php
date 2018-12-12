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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/**
 * http://dev.blog.com/api/
 */
Route::group(['namespace' => "Api", 'middleware' => 'token'], function ($router) {

    $router->get('/', 'IndexController@index')->name('api.index');
    $router->post('/', 'IndexController@index')->name('api.index');

    /**
     * 事件
     */
    $router->get('/event', 'IndexController@event')->name('api.event');

    //兜底路由
    $router->fallback(function () {
        return json_encode([
            'code' => -1,
            'message' => '你所访问的接口不存在'
        ]);
    });

    /**
     * 频率限制
     * 在 Laravel 5.6 中，还引入了频率限制功能。
     * 所谓频率限制，指的是在指定时间单个用户对某个路由的访问次数限制，该功能有两个
     * 使用场景，一个是在某些需要验证/认证的页面限制用户失败尝试次数，提高系统的安
     * 全性，另一个是避免非正常用户（比如爬虫）对路由的过度频繁访问，从而提高系统的
     * 可用性，此外，在流量高峰期还可以借助此功能进行有效的限流。
     */
    $router->middleware('throttle:10,1')->group(function () use ($router) {
        $router->get('/user', function () {
            return json_encode(['code' => 200, 'data' => ['user_list' => []]]);
        });
    });



    $router->get('/flights/{flights}', function (\App\Models\Flights $flights) {
        dd($flights->getOriginal());
    });


});