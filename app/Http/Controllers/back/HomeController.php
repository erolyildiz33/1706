<?php

namespace App\Http\Controllers\back;


use App\Http\Controllers\Controller;
use App\dosyalar;
use App\sahalar;

use Carbon\Carbon;


class HomeController extends Controller
{
   public function index()
   {
      return "admin Page";
   }
   public  function getDiff($strStart){
       $dteStart = Carbon ::parse(date('Y-m-d H:i:s',$strStart));
       $today = Carbon ::now();
       $dteDiff  = $today->diffInMinutes($dteStart,false);
       return  gmdate('H',$dteDiff);
   }
   public function cronjob()
   {
       set_time_limit(0);
       foreach (new \DirectoryIterator(INPUT_VIDEO_FOLDER) as $fileInfo) {
           if($fileInfo->isDot()) continue;
           //dd($this->getDiff($fileInfo->getATime()));
           if ($this->getDiff($fileInfo->getATime())<5) continue;
           $filename= $kamerano=explode("_",$fileInfo->getFilename())[1]."_".date('dmYHis',$fileInfo->getATime()).".mp4";
           if(!dosyalar::get()->where('dosyaadi',$filename)->count()>0){

               $cmd="d:/ffmpeg/bin/ffmpeg -i ".INPUT_VIDEO_FOLDER.DIRECTORY_SEPARATOR.$fileInfo->getFilename()." -threads 0 -c:v libx264 -preset ultrafast -crf 19 -qmin 10 -qmax 51 -c:a libfdk_aac -b:a 128k -y ".OUTPUT_VIDEO_FOLDER.DIRECTORY_SEPARATOR.$filename."  2>&1";
               if (exec($cmd)){
                   $sahaid=sahalar::where('sahaadi',explode("_",$fileInfo->getFilename())[0])->get('id')[0]->id;

                   $kamerano=explode("_",$fileInfo->getFilename())[1];
                   dosyalar::create(['sahaid'=>$sahaid,'dosyaadi'=>$filename,'kamerano'=>$kamerano]);
               }
               unlink(INPUT_VIDEO_FOLDER.DIRECTORY_SEPARATOR.$fileInfo->getFilename());
           }
       }
       return view('deneme');
   }
}
