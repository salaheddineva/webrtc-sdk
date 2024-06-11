<?php

namespace Veniseactivation\WebRTCSDK;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class WebRTCSDKServiceProvider extends ServiceProvider
{
  public function register()
  {
    //
  }

  public function boot()
  {
    Route::prefix('webrtc-sdk')
      ->as('webrtc-sdk.')
      ->group(function() {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
      });
  }
}