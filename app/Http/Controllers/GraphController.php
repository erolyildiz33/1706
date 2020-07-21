<?php

namespace App\Http\Controllers;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class GraphController extends Controller
{
    private $api;
    public function __construct(Facebook $fb)
    {
        $this->middleware(function ($request, $next) use ($fb) {
            $fb->setDefaultAccessToken(Auth::user()->token);
            $this->api = $fb;
            return $next($request);
        });
    }

    public function retrieveUserProfile(){
        try {

            $params = "first_name,last_name,age_range,gender";

            $user = $this->api->get('/me?fields='.$params)->getGraphUser();

            dd($user);

        } catch (FacebookSDKException $e) {

        }

    }
    public function publishToProfile(Request $request){
        $absolute_image_path = '/var/www/larave/storage/app/images/lorde.png';
        try {
            $response = $this->api->post('/me/feed', [
                'message' => $request->message,
                'source'    =>  $this->api->fileToUpload(public_path().'/outputvideos/1_1_220620201845.mp4')
            ])->getGraphNode()->asArray();

            if($response['id']){
                // post created
            }
        } catch (FacebookSDKException $e) {
            dd($e); // handle exception
        }
    }
}
