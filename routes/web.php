<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::group(['namespace' => 'Admin', 'domain' => config('app.admin_endpoint')], function () {
    Route::get('auth/login', 'Auth\AuthController@getLogin')->name('admin_login');
    Route::post('auth/login', 'Auth\AuthController@login');
    Route::get('auth/logout', 'Auth\AuthController@logout')->name('admin_logout');
});

Route::group(['namespace' => 'Admin', 'domain' => config('app.admin_endpoint'), 'middleware' => ['admin'], 'as' => 'admin::'], function () {
    Route::get('', 'DashboardController@index')->name('dashboard');
    Route::Resource('users', 'UserController');
    Route::Resource('games', 'GameController');
    Route::Resource('frames', 'FrameController');
    Route::Resource('launches', 'LaunchController');
});
