<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * http://dev.admin.blog.com/welcome
 */
Route::get('/welcome', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Auth'], function ($router) {
//    $router->get('/');
});

Route::resource('post', 'PostController');


/**
 * http://dev.admin.blog.com/
 * http://dev.admin.blog.com/login
 * http://dev.admin.blog.com/loginOut
 */
Route::group(['domain' => 'dev.admin.blog.com'], function ($router) {
    $router->get('/', 'Admin\AuthController@getLogin')->name('admin.init');
    //直接访问不了，需要在表单中加入令牌参数
    $router->post('/login', 'Admin\AuthController@postLogin')->name('admin.postLogin');
    $router->get('/loginOut', 'Admin\AuthController@getLoginOut')->name('admin.getLoginOut');


    /**
     * http://dev.admin.blog.com/store?title=22
     */
    $router->get('/store', 'Admin\AuthController@store');
});

/**
 * http://dev.blog.com/web/
 */
Route::group(['namespace' => "Web", 'prefix' => 'web'], function ($router) {
    $router->get('/', 'IndexController@index')->name('web.index');

    $router->get('task/{id}/delete', function ($id) use ($router) {
        return '<form method="post" action="' . route('task.delete', [$id]) . '">
                <input type="hidden" name="_method" value="DELETE"> 
                 <input type="hidden" name="_token" value="' . csrf_token() . '">
                <button type="submit">删除任务</button>
            </form>';
    });

    $router->delete('task/{id}', function ($id) {
        return 'Delete Task ' . $id;
    })->name('task.delete');


    /**
     * 视图
     */
    Route::get('page/{id}', function ($id) {

        $pages = [
            ['title' => 'a'],
            ['title' => 'b'],
            ['title' => 'c'],
            ['title' => 'd'],
            ['title' => 'e'],
            ['title' => 'f'],
            ['title' => 'g'],
        ];

        return view('page.show', ['id' => $id, 'pages' => $pages]);
    })->where('id', '[0-9]+');


});

/**
 * http://dev.blog.com/api/
 */
Route::group(['namespace' => "Api", 'prefix' => 'api'], function ($router) {

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

    $router->get('/', 'IndexController@index')->name('api.index');

    $router->get('/flights/{flights}', function (\App\Models\Flights $flights) {
        dd($flights->getOriginal());
    });


});

/**
 * http://dev.blog.com/m/
 */
Route::group(['namespace' => "Wap", 'prefix' => 'm'], function ($router) {
    $router->get('/', 'IndexController@index')->name('wap.index');
});

/**
 * http://dev.admin.blog.com/admin/
 */
Route::group(['domain' => 'dev.admin.blog.com', 'prefix' => 'admin', 'namespace' => 'Admin'], function ($router) {
    $router->get('/', 'IndexController@index')->name('admin.index');

});


