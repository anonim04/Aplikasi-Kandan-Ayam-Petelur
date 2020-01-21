<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\StatusFeedWater;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function numberEgg(Request $request){
        route('send',['request'=>'']);
    }
}
