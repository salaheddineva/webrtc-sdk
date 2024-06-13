<?php

return [

  /*
    |--------------------------------------------------------------------------
    | Pusher API Credentials
    |--------------------------------------------------------------------------
    |
    | Here you may specify your Pusher API credentials. These will be used
    | to authenticate users and channels.
    |
    */

  'pusher' => [
    'app_id' => env('PUSHER_APP_ID'),
    'app_key' => env('PUSHER_APP_KEY'),
    'app_secret' => env('PUSHER_APP_SECRET'),
    'app_cluster' => env('PUSHER_APP_CLUSTER'),
    'app_encrypted' => env('PUSHER_APP_ENCRYPTED', true),
  ],
];
