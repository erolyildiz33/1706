<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\sahalar;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {


        return view("front.index");
    }
    function ilcegetir(Request $request){
        return (sahalar::where('il',mb_strtolower($request->id))->orderBy('ilce', 'asc')->distinct('ilce')->pluck('ilce'));

    }
    function sahagetir(Request $request){
        return (sahalar::where('ilce',mb_strtolower($request->id))->orderBy('sahaadi', 'asc')->distinct('sahaadi')->pluck('sahaadi'));

    }
}
