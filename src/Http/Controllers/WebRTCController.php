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
      "023bb5c1d36a8bc0075f",
      "50e075920e1f10129c29",
      "1560952",
      [
        'cluster' => "eu",
        'useTLS' => true,
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
