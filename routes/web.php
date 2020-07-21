<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/admin','back\HomeController@index')->name('admin');
Route::get('/cronjob','back\HomeController@cronjob')->name('cronjob');
Route::post('/ajaxme','front\HomeController@ajaxme');
Route::post('/edit-video','front\HomeController@detay');
Route::post('/cutthis','front\HomeController@cutit');

Route::get('/login/facebook', 'Auth\LoginController@redirectToFacebookProvider');

Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderFacebookCallback');
Route::group(['middleware' => [
    'auth'
]], function(){

    Route::get('/user', 'GraphController@retrieveUserProfile');

    Route::post('/user', 'GraphController@publishToProfile');

});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
