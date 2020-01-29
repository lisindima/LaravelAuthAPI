<?php

return [
  'gcm' => [
      'priority' => 'normal',
      'dry_run' => false,
      'apiKey' => 'My_ApiKey',
  ],
  'fcm' => [
        'priority' => 'normal',
        'dry_run' => false,
        'apiKey' => 'AAAAO1huez8:APA91bGFXOIfgQuHBBwku8HTy5q7-pHaCWVOLcDzsdsLZ7y16OO99tdgaaietxJ3zlmP5L8XYR5U9C_QfdQpsS7hxHpveYzBCtpbl86M9sCxHOKuF1BPVO595FISjoyGiwQ0dsjF6Ivp',
  ],
  'apn' => [
      'certificate' => __DIR__ . '/iosCertificates/apns-dev-cert.pem',
      'passPhrase' => '1234', //Optional
      'passFile' => __DIR__ . '/iosCertificates/yourKey.pem', //Optional
      'dry_run' => true
  ]
];