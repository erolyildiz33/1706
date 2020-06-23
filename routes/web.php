<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\front\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','front\HomeController@index')->name('home');
Route::get('/ilcegetir','front\HomeController@ilcegetir');
Route::get('/sahagetir','front\HomeController@sahagetir');
Route::get('/admin','back\HomeController@index')->name('admin');
Route::get('/cronjob','back\HomeController@cronjob')->name('cronjob');
Route::get('/ajax/{contr}/{id}', function ($controller,$id){
   // Route::get('/sonuc/{id}', 'front\HomeController@'.$controller,['_token'=>csrf_token(),'id'=> $id]);

    return redirect()->action('front\HomeController@'.$controller,['_token'=>csrf_token(),'id'=> $id]);

});





