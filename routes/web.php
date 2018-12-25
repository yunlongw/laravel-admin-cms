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

Auth::routes();
Auth::check();
/**
 * http://dev.admin.blog.com/welcome
 */
Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/test', "TestController@index");

Route::get("/chat", "ChatController@index");
Route::post("/chat", "ChatController@chat");

Route::group(['namespace' => 'Auth'], function ($router) {
//    $router->get('/');
});

Route::resource('post', 'PostController');

//Route::post('login', [ 'as' => 'login', 'uses' => 'LoginController@do']);



//Route::get('/home', 'HomeController@index')->name('home');



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
 * http://dev.blog.com/m/
 */
Route::group(['namespace' => "Wap", 'prefix' => 'm'], function ($router) {
    $router->get('/', 'IndexController@index')->name('wap.index');
});

/**
 * http://dev.admin.blog.com/admin/
 */
Route::group(['domain' => 'dev.admin.blog.com', 'namespace' => 'Admin', 'middleware' => 'auth', 'prefix' => 'admin'], function ($router) {

    $router->get('/', 'IndexController@index')->name('admin.admin.index');

    //用户列表
    $router->get('/users','UserController@index')->name('admin.User.index');

    //角色
    $router->get('/roles','RolesController@index')->name('admin.roles.index');
    $router->get('/roles/create','RolesController@create')->name('admin.roles.create');
    $router->get('/roles/edit','RolesController@edit')->name('admin.roles.edit');
    $router->post('/roles/store','RolesController@store')->name('admin.roles.store');
    $router->post('/roles/destroy','RolesController@destroy')->name('admin.roles.destroy');


    $router->get('/permissions','PermissionsController@index')->name('permissions.index');


});

/**
 * http://dev.admin.blog.com/
 * http://dev.admin.blog.com/login
 * http://dev.admin.blog.com/loginOut
 */
//Route::group(['domain' => 'dev.admin.blog.com'], function ($router) {
//
//    $router->get('/home', 'HomeController@index')->name('home');
//    $router->get('/', 'HomeController@index')->name('home');
//
//    //直接访问不了，需要在表单中加入令牌参数
////    $router->post('/login', 'Admin\AuthController@postLogin')->name('admin.postLogin');
////    $router->get('/loginOut', 'Admin\AuthController@getLoginOut')->name('admin.getLoginOut');
////    $router->get('/store', 'Admin\AuthController@store');
//});


//增加 auth 中间件，验证使用权限
Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/home', 'HomeController@index')->name('home');
