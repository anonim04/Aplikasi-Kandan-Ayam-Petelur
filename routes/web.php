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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user', 'Auth\UserController@index')->name('user.index');

Route::post('/store/number/egg', 'HomeController@numberEgg')->name('number.egg');

Route::get('/device/status/{status}', 'CommunicationDeviceController@statusDevice')->name('status.device');

Route::get('/run/device/{id}', 'CommunicationDeviceController@RunDevice')->name('run.device');
