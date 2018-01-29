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
*/

Route::get('/', function (Request $request) {
    return response()->json([
        'success' => true
    ]);
});

Route::group(['namespace' => 'Api'], function () {
    Route::post('login', 'UserController@login')->name('api_login');
    Route::post('users', 'UserController@store');
    Route::post('users/login', 'UserController@storeAndLogin');

    Route::post('password/email', 'Auth\PasswordController@postEmail');
    Route::post('password/reset', 'Auth\PasswordController@postReset');
});

Route::group(['namespace' => 'Api', 'middleware' => ['auth:api'], 'as' => 'api::'], function () {
    Route::Resource('users', 'UserController', ['except' => [
        'create', 'edit', 'store'
    ]]);
    Route::Resource('games', 'GameController', ['except' => [
        'create', 'edit'
    ]]);
    Route::Resource('frames', 'FrameController', ['except' => [
        'create', 'edit'
    ]]);
    Route::Resource('launches', 'LaunchController', ['except' => [
        'create', 'edit'
    ]]);
});
