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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//获取用户信息接口
Route::get('/users/{id}', 'UserController@show');
//登录用户接口认证
Route::post('/login', 'LoginController@authenticate');
//用户头像更新
Route::post('/update/avatar', 'UserController@updateAvatar');
Route::post('/update/info', 'UserController@updateInfo');
