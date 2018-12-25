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

Route::get('/welcome', function () {
    return view('welcome');
});

//测试
Route::get('/test', "TestController@index");

//聊天室
Route::get("/chat", "ChatController@index");
Route::post("/chat", "ChatController@chat");

Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::get('/home', 'HomeController@index')->name('home');


// http://dev.blog.com/web/
Route::group(['namespace' => "Web", 'prefix' => 'web'], function ($router) {

});


// http://dev.blog.com/m/
Route::group(['namespace' => "Wap", 'prefix' => 'm'], function ($router) {
    $router->get('/', 'IndexController@index')->name('wap.index');
});


Route::group(['domain' => 'dev.admin.blog.com', 'middleware' => 'auth'], function ($router) {
    $router->get('/', 'admin\IndexController@index');
});
Route::group(['domain' => 'dev.admin.blog.com', 'namespace' => 'Admin', 'middleware' => 'auth', 'prefix' => 'admin'], function ($router) {

    $router->get('/', 'IndexController@index')->name('admin.admin.index');
    $router->get('/home', 'IndexController@index');

    Route::resource('users', 'UserController');
    Route::resource('roles', 'RolesController');
    Route::resource('permissions', 'PermissionsController');
});


