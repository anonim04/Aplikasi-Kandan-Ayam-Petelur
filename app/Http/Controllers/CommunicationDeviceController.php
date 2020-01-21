<?php

namespace App\Http\Controllers;

use App\CommunicationAppNodemcu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class CommunicationDeviceController extends Controller
{
    public function RunDevice(Request $request, $id){
        $data = CommunicationAppNodemcu::findOrFail($id);
        $data->turn = 'on';
        if($data->update()){
            return view('home')->with('status','success');
        }
        else{
            return view('home')->with('status','Gagal');
        }
    }
}
