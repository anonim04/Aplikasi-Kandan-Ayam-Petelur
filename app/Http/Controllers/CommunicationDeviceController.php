<?php

namespace App\Http\Controllers;

use App\HistoryDevice;
use App\Events\StatusFeedWater;
use App\CommunicationAppNodemcu;

use Illuminate\Http\Request;

class CommunicationDeviceController extends Controller
{
    public function runDevice($idDevice, $idUser)
    {
        $device = CommunicationAppNodemcu::findOrFail($idDevice);
        $device->turn = 'on';
        if($device->update()){
            $model = new HistoryDevice();
            $model->create([
                'user_id' => $idUser,
                'communication_app_nodemcus_id' => $idDevice
            ]);
            return redirect('home');
        }
        else{
            return redirect('home');
        }
    }

    public function statusDevice($id)
    {
        $data = CommunicationAppNodemcu::findOrFail($id);
        $data->turn = 'off';
        if($data->update()){
            return response()->json(['message'=>'success']);
        }
        else{
            return response()->json(['message'=>'failed']);
        }
    }

    public function sendData(Request $request)
    {
        event(new StatusFeedWater($request->get("feed"), $request->get("water")));
        $feed = CommunicationAppNodemcu::findOrFail('1');
        $water = CommunicationAppNodemcu::findOrFail('2');
        if($feed->turn=="on"){
            return response()->json([
                'feed' => 'on'
            ]);
        }
        else if($water->turn=="on"){
            return response()->json([
                'water' => 'on'
            ]);
        }
    }
}
