<?php

namespace App\Http\Controllers\front;

use App\dosyalar;
use App\Http\Controllers\Controller;
use App\kameralar;
use App\sahalar;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {


        return view("front.index");
    }
    function ajaxme(Request $request){

        if ($request->veri['cont']=='convert')
        {
            return [implode("-",explode(".",$request->veri['data']))];
        }

        elseif ($request->veri['cont']=='ilcegetir')
       {
           return (sahalar::where('il',$request->veri['id'])->orderBy('ilce', 'asc')->distinct('ilce')->pluck('ilce'));
       }
        elseif ($request->veri['cont']=='sahagetir')
        {
            return (sahalar::where('il',$request->veri['il'])->where('ilce',$request->veri['id'])->orderBy('sahaadi', 'asc')->distinct('sahaadi')->pluck('sahaadi'));
        }

        elseif ($request->veri['cont']=='macgetir')

        {
            $sahaId=sahalar::where('il',$request->veri['il'])->where('ilce',$request->veri['ilce'])->where('sahaadi',$request->veri['id'])->get('id');
            $maclar=dosyalar::where('sahaid',$sahaId[0]->id)->orderBy('created_at', 'asc')->get('dosyaadi');
            if(!$maclar){
                return ["disable"];
            }
            else
                {
                $enabledDates=array();
                foreach ($maclar as $k => $v)
                    {
                        $kamerano=explode(".",explode("_",$v['dosyaadi'])[1])[0];
                        $tarih=explode(".",explode("_",$v['dosyaadi'])[2])[0];
                        array_push($enabledDates,['saha'=>$request->veri['id'],'kamerano'=>$kamerano,'date'=>Carbon::createFromFormat('dmYHis', $tarih)->format('d-m-Y'),'time'=>Carbon::createFromFormat('dmYHis', $tarih)->format('H:i')]);

                    }
                return $enabledDates;
                }
        }

    }

}
