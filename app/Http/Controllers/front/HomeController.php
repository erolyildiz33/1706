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
        elseif ($request->veri['cont']=='kameragetir')
        {
            $sahaId=sahalar::where('il',$request->veri['il'])->where('ilce',$request->veri['ilce'])->where('sahaadi',$request->veri['id'])->get('id');
            return (kameralar::where('sahaid',$sahaId[0]->id)->get());
        }
        elseif ($request->veri['cont']=='macgetir')

        {
            $sahaId=sahalar::where('il',$request->veri['il'])->where('ilce',$request->veri['ilce'])->where('sahaadi',$request->veri['saha'])->get('id');
            $maclar=dosyalar::where('sahaid',$sahaId[0]->id)->where('kamerano',$request->veri['id'])->orderBy('created_at', 'asc')->get('dosyaadi');
            if(!$maclar){
                return ["disable"];
            }
            else
                {
                $enabledDates=array();
                foreach ($maclar as $k => $v)
                    {

                        $tarih=explode(".",explode("_",$v['dosyaadi'])[2])[0];
                        array_push($enabledDates,['date'=>Carbon::createFromFormat('dmYHis', $tarih)->format('d-m-Y'),'time'=>Carbon::createFromFormat('dmYHis', $tarih)->format('H:i')]);

                    }

                return $enabledDates;
                }
        }

    }

}
