<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

class PushController extends Controller
{
    public function index()
    {
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder('Laravel');
        $notificationBuilder->setBody('Привет')
            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['a_data' => 'my_data']);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        $token = "c4JETh50UrTxd6tq9gmR2f:APA91bEkJvNtXjBrNO6dQaIAQDihAmvdapxZZ9NNM_PK96bRZRBOMyVW8C2XYWhahTy7vOGnN1_n1t7uzRbfvx_xMze7LfA8ABoLBTuAdy2RAA-Hwz-7lKJamKivpMvGg7n8EtiaPn9w";

        $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);
      
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