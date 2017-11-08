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

Route::get('/', function () {
    return view('welcome');
});

    Route::post('auth/login', 'ApiController@login');
    Route::post('auth/register', 'ApiController@createuser');
    Route::get('auth/logout', 'ApiController@logout');
    
    Route::group(['middleware' => ['jwt.auth','cors']], function () {
    	Route::get('auth/home',function(){
    		return 'OK';
    	});

        Route::get('user', 'ApiController@getAuthUser');
    });

    /*eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6Ly9sb2NhbGhvc3Qvand0bG9naW4vand0L3B1YmxpYy9hdXRoL3JlZ2lzdGVyIiwiaWF0IjoxNTEwMDUxNzAxLCJleHAiOjE1MTAwNTUzMDEsIm5iZiI6MTUxMDA1MTcwMSwianRpIjoidGQxa3BYdFE3WVhDRTkzMSJ9.xJxPpc_5t7CF_sx2QuiN66iemMsAYDXQRpYFJaVZv3o*/