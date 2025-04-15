<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\GatewayController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/// Slider api //
Route::get('/sliders',[SliderController::class, 'ApiAllSlider']);

/// Service api //
Route::get('/services',[ServiceController::class, 'AllServices']);
Route::get('/service/{slug}',[ServiceController::class, 'getServiceBySlug']);

/// Gateway one api //
Route::get('/gatewayone',[GatewayController::class, 'ApiGatewayOne']);
/// Gateway Two api //
Route::get('/gatewaytwo',[GatewayController::class, 'ApiGatewayTwo']);
