<?php
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

Route::post('/send/data', 'CommunicationDeviceController@sendData');

Route::get('/update/device/{id}', 'CommunicationDeviceController@statusDevice')->name('update.device');
