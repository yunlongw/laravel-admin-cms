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

Route::group(['namespace' => "Web"], function ($router) {
    $router->get('/', 'IndexController@index')->name('web.index');
});

Route::group(['namespace' => "Api", 'prefix' => 'api'], function ($router) {
    $router->get('/', 'IndexController@index')->name('api.index');
});

Route::group(['namespace' => "Wap", 'prefix' => 'm'], function ($router) {
    $router->get('/', 'IndexController@index')->name('wap.index');
});

Route::group(['domain' => 'dev.admin.blog.com', 'prefix' => 'admin', 'namespace' => 'Admin'], function ($router) {
    $router->get('/', 'IndexController@index')->name('admin.index');
});
