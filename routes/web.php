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
Route::get('login', 'Web\UserController@login')->name('login');
Route::post('login', 'Web\LoginController@login');
Route::get('editbook', 'Web\LoginController@editbook');
Route::post('updatebook', 'Web\LoginController@update');
Route::post('addbook', 'Web\LoginController@store');
Route::post('registeruser', 'Web\LoginController@register');
Route::get('registerpage', 'Web\LoginController@registerpage')->name('registerpage');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');