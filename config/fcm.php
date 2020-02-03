<?php

return [
    'driver' => env('FCM_PROTOCOL', 'http'),
    'log_enabled' => true,

    'http' => [
        'server_key' => env('FCM_SERVER_KEY', 'AAAAO1huez8:APA91bGFXOIfgQuHBBwku8HTy5q7-pHaCWVOLcDzsdsLZ7y16OO99tdgaaietxJ3zlmP5L8XYR5U9C_QfdQpsS7hxHpveYzBCtpbl86M9sCxHOKuF1BPVO595FISjoyGiwQ0dsjF6Ivp'),
        'sender_id' => env('FCM_SENDER_ID', '254886705983'),
        'server_send_url' => 'https://fcm.googleapis.com/fcm/send',
        'server_group_url' => 'https://android.googleapis.com/gcm/notification',
        'timeout' => 30.0, // in second
    ],
];
