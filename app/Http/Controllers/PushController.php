<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

class PushController extends Controller
{
    public function index(Request $request)
    {

        $title = $request['title'];
        $body = $request['body'];
        $token_device = $request['token_device'];

        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder($title);
        $notificationBuilder->setBody($body)
            ->setSound('default');

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();

        $token = $token_device;

        $downstreamResponse = FCM::sendTo($token, $option, $notification);
        
        return response()->json(array(
            'token' => $token_device,
            'title' => $title,
            'body' => $body, 
            'success' => $downstreamResponse->numberSuccess(), 
            'fail' => $downstreamResponse->numberFailure(), 
            'msg' => $downstreamResponse->tokensWithError()), 
            200
        );
    }


    public function multiple_device()
    {
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder('Múltiple Device');
        $notificationBuilder->setBody('Hello world')
            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['a_data1' => 'my_data1']);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        $tokens = ['eTv6otrlhRM:APA91bHEZkv-BTwYEmo76iheFRjiO_R3qqg2ctJP5jgGkKhqJQFK0OoELGzTYdoDk20KAuxjMzwcWpZaFi7rt65_NGR2TC4MTGMp3UN_y69Hi3L_81uBNPHRchWT64e2JVjk0HfcShyo'];

        $downstreamResponse = FCM::sendTo($tokens, $option, $notification);

        return response()->json(array(
            'status' =>'1', 
            'success' => $downstreamResponse->numberSuccess(), 
            'fail' => $downstreamResponse->numberFailure(), 
            'msg' => $downstreamResponse->tokensWithError()), 
            200
        );
    }


    public function notificacion()
    {
        $notificationBuilder = new PayloadNotificationBuilder();
        $notificationBuilder->setTitle('title')
            ->setBody('body')
            ->setSound('sound')
            ->setBadge('badge');

        $notification = $notificationBuilder->build();

        dd($notification);
    }

}