<?php

namespace Veniseactivation\WebRTCSDK\Http\Controllers;

use Illuminate\Routing\Controller;
use Pusher\Pusher;

class WebRTCController extends Controller
{
  protected $pusher;

  public function __construct()
  {
    $this->pusher = new Pusher(
      config('webrtcsdk.pusher.app_key'),
      config('webrtcsdk.pusher.app_secret'),      
      config('webrtcsdk.pusher.app_id'),
      [
        'cluster' => config('webrtcsdk.pusher.app_cluster'),
        'useTLS' => true,
        'encrypted' => config('webrtcsdk.pusher.app_encrypted') === 'true',
      ]
    );
  }

  public function auth()
  {
    $socket_id = request()->socket_id;
    $channel_name = request()->channel_name;
    $presence_data = ['name' => 'John Doe'];

    $auth = $this->pusher->authorizePresenceChannel($channel_name, $socket_id, '1', $presence_data);
    return response($auth);
  }
}
