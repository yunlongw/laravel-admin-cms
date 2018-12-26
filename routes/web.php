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

Route::get('/welcome', function () {
    return view('welcome');
});

//测试
Route::get('/test', "TestController@index");

//聊天室
Route::get("/chat", "ChatController@index");
Route::post("/chat", "ChatController@chat");
Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['guard' => 'admin','domain' => 'dev.admin.blog.com'], function ($router) {

    $router->get('/', 'admin\IndexController@index');
    $router->get('/home', 'admin\IndexController@index');
});

Route::group(['guard' => 'admin','domain' => 'dev.admin.blog.com', 'namespace' => 'Admin', 'prefix' => 'admin'], function ($router) {

    $router->get('/', 'IndexController@index');
    $router->get('/home', 'IndexController@index');

    Route::resource('users', 'UserController');
    Route::resource('roles', 'RolesController');
    Route::resource('permissions', 'PermissionsController');
});


