<?php

namespace Veniseactivation\WebRTCSDK\Http\Controllers;

use Illuminate\Routing\Controller;

class AppController extends Controller
{
  public function index()
  {
    return view('webrtc-sdk::index');
  }
}