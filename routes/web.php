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
Route::get('test','Home\IndexController@test');
Route::get('getData','Home\IndexController@getData');
Route::get('env','Home\IndexController@env');
Route::get('register','Home\UserController@register');
Route::post('doregister','Home\UserController@doregister');
Route::get('login','Home\UserController@login');
Route::post('dologin','Home\UserController@dologin');
Route::get('logout','Home\UserController@logout');
Route::get('api','Home\IndexController@api');
Route::get('queue','Home\MqueueController@producer');
Route::get('editable','Home\IndexController@editable');