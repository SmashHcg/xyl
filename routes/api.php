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
//登录用户接口认证
Route::post('/login', 'LoginController@authenticate');
//用户图片上传
Route::post('/images', 'ImagesController@store');
//用户头像更新
Route::post('/update/avatar', 'UserController@updateAvatar');
//用户信息更新
Route::post('/update/info', 'UserController@updateInfo');
//用户查找功能
Route::post('/search', 'UserController@search');
//动态发布和删除
Route::post('/status/fabu', 'StatusApiController@store');
