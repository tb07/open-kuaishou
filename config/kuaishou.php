<?php

return [
    'appKey'           => env('KUAISHOU_KEY'),
    'appSecret'        => env('KUAISHOU_SECRET'),
    'signSecret'       => env('KUAISHOU_SIGNSECRET'),
    'messageSecretKey' => env('KUAISHOU_MESSAGESECRET'),
    'debug'            => env('KUAISHOU_DEBUG', true),
];