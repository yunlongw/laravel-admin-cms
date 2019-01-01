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

Route::group(['guard' => 'Admin'], function ($router) {

    $router->get('/', 'Admin\IndexController@index');
    $router->get('/home', 'Admin\IndexController@index');
});

Route::group(['guard' => 'admin', 'prefix' => 'admin'], function ($router) {

    $router->get('/', 'IndexController@index');
    $router->get('/home', 'IndexController@index');

    Route::resource('users', 'Admin\UserController');
    Route::resource('roles', 'Admin\RolesController');
    Route::resource('permissions', 'Admin\PermissionsController');
});


