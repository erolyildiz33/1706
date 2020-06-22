<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\sahalar;


class HomeController extends Controller
{
    public function index()
    {


        return view("front.index");
    }
    function ilcegetir(Request $request){
        dd($request->all());
    }
}
