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

Route::post('/user/signup', 'UserController@signup')->name('user.signup');
Route::post('/user/login', 'UserController@login')->name('user.login');
Route::post('/user/logout', 'UserController@logout')->name('user.logout');

