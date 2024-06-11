<?php

use Illuminate\Support\Facades\Route;
use Veniseactivation\WebRTCSDK\Http\Controllers\AppController;

Route::get('/', [AppController::class, 'index']);