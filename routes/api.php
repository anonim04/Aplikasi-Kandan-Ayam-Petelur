<?php

use App\Events\StatusFeedWater;
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

Route::get('/receive', function (\Illuminate\Http\Request $request) {
    event(new App\Events\StatusFeedWater($request->get("feed"), $request->get("water")));
});

Route::get('/send{request}', function($request){
    if($request=="feed"){
        return response()->json([
            'device' => 'feed'
        ]);
    }
    elseif($request=="water"){
        return response()->json([
            'device' => 'water'
        ]);
    }
    else{
        return redirect('home')->with('error', 'Terdapat kesalahann');
    }
})->name('send');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

