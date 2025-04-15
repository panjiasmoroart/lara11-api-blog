<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\GatewayController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\SettingController;

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

/// Gateway Testimonial api //
Route::get('/gettestimonial',[TestimonialController::class, 'ApiGetTestimonial']);

///  Blog Category api //
Route::get('/blogcat',[BlogController::class, 'ApiBlogCat']);
///  Blog Post api //
Route::get('/allblog',[BlogController::class, 'ApiAllBlog']);
Route::get('/allblog/{slug}',[BlogController::class, 'ApiAllBlogSlug']);

///  Sitesetting api //
Route::get('/sitesetting',[SettingController::class, 'ApiSiteSetting']);
