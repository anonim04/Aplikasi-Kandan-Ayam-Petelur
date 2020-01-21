<?php

use App\Events\StatusFeedWater;
use App\Http\Controllers\CommunicationDeviceController;
use App\Http\Controllers\HomeController;
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

Route::post('/receive', function (\Illuminate\Http\Request $request) {
    event(new App\Events\StatusFeedWater($request->get("feed"), $request->get("water")));
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/receive/device', function(){
    $data = App\CommunicationAppNodemcu::all();
    return response()->json($data);
});

Route::put('/update/device/{id}', function(\Illuminate\Http\Request $request, $id){
    $data = App\CommunicationAppNodemcu::findOrFail($id);
    $data->turn = 'off';
    if($data->update()){
        return response()->json(['message'=>'success']);
    }
    else{
        return response()->json(['message'=>'failed']);
    }
})->name('update.device');
