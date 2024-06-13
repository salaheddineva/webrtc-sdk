<?php

use Illuminate\Support\Facades\Route;
use Veniseactivation\WebRTCSDK\Http\Controllers\AppController;
use Veniseactivation\WebRTCSDK\Http\Controllers\WebRTCController;

Route::get('/', [AppController::class, 'index']);
Route::post('/auth', [WebRTCController::class, 'auth']);