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

    Route::group(['middleware' => 'jwt.auth'], function () {
    	Route::get('home',function(){
    		return 'OK';
    	});
        Route::get('user', 'ApiController@getAuthUser');
    });

    /*eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6Ly9sb2NhbGhvc3QvbG9naW5hcGkvYmxvZy9wdWJsaWMvYXV0aC9yZWdpc3RlciIsImlhdCI6MTUxMDAxNjY5OCwiZXhwIjoxNTEwMDIwMjk4LCJuYmYiOjE1MTAwMTY2OTgsImp0aSI6IjZ6cThQcHBiZFo2TE00RkQifQ.xp58UTwHcYo5EW2dcCeOR09VgwBnn0tfGjeAOPhD42g*/