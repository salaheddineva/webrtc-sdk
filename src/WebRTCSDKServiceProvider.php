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
    $this->loadViewsFrom(__DIR__ . '/../resources/views', 'webrtc-sdk');

    $this->publishes([
      __DIR__ . '/../dist' => public_path('vendor/webrtc-sdk'),
    ], 'public');

    Route::prefix('webrtc-sdk')
      ->as('webrtc-sdk.')
      ->group(function() {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
      });
  }
}