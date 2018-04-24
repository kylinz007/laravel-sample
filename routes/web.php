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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');

Route::get('signeup', 'UserController@create')->name('signup');
Route::resource('users', 'UserController');

//展示登录页面
Route::get('login', 'SessionController@create')->name('login');
//登录，创建会话
Route::post('login', 'SessionController@store')->name('login');
//注销，销毁会话
Route::delete('logout', 'SessionController@destroy')->name('logout');