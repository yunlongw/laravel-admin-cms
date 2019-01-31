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

//Route::get('/welcome', function () {
//    return view('welcome');
//});

//测试
Route::get('/test', "TestController@index");
Route::get('/socketio', "TestController@socketio");
Route::get('/sentry', "TestController@sentry");

//聊天室
Route::get("/chat", "ChatController@index");
Route::post("/chat", "ChatController@chat");
//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['guard' => 'Admin'], function ($router) {

    $router->get('/', 'Admin\IndexController@index');
    $router->get('/home', 'Admin\IndexController@index');
});

Route::group(['guard' => 'admin', 'namespace' => 'Admin', 'prefix' => 'admin'], function ($router) {

    $router->get('/', 'IndexController@index');
    $router->get('/dashboard', 'IndexController@dashboard');
    $router->get('/home', 'IndexController@index');
    $router->get('/logs', 'LogController@index');

    Route::resource('users', 'UserController');
    Route::resource('roles', 'RolesController');
    Route::resource('permissions', 'PermissionsController');

    Route::resource('apis', 'ApiManageControllers');
    Route::resource('android', 'AndroidControllers');
    Route::resource('ios', 'IosControllers');

});


