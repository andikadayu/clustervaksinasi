<?php

use Illuminate\Support\Facades\Route;

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
#login admin
Route::get('loginadmin', 'AdminLoginController@index')->name('loginadmin');
Route::post('post-login-admin', 'AdminLoginController@post_login_admin')->name('post_login_admin');
Route::get('logout1', 'AdminLoginController@logout')->name('logout1');

#login user
Route::get('/', 'UserLoginController@index')->name('login');
Route::post('post-login', 'UserLoginController@post_login')->name('post_login');
Route::get('logout', 'UserLoginController@logout')->name('logout');


Route::get('register', 'UserLoginController@showFormRegister')->name('register');
Route::post('register', 'UserLoginController@register');

Route::group(['middleware' => ['CekLogin','AdminMiddleware:admin']], function () {

        Route::get('homeadmin', 'Controller@data')->name('homeadmin');

        Route::get('testing', 'Testing@index')->name('testing');

        Route::get('hijau', 'Controller@hijau')->name('hijau');

        Route::get('kuning', 'Controller@kuning')->name('kuning');

        Route::get('orange', 'Controller@orange')->name('orange');

        Route::get('merah', 'Controller@merah')->name('merah');

        Route::get('api-get', 'Controller@API')->name('apis');

        Route::get('datakabprov', 'DataKecamatan@index');

        Route::get('target','DtargetController@index');

        Route::get('carikec','DtargetController@carikec')->name('carikec');

        Route::post('simpan-vaksin','DtargetController@simpan')->name('simpan-vaksin');

        Route::get('datatarget', 'TanggalController@index');

        Route::get('filtertanggal1', 'FilterController@index')->name('filter');

        Route::get('filtertanggal/proses','FilterController@proses');

});

Route::group(['middleware' => ['CekLogin','UserMiddleware:user']], function () {

        Route::get('filtertanggal', 'UserController@index')->name('home1');

        Route::get('filtertanggal/proses','UserController@proses');

});
