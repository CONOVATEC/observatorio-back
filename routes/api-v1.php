<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\PostApiController;
use App\Http\Controllers\Api\V1\AboutApiController;
use App\Http\Controllers\Api\V1\CategoryApiController;
use App\Http\Controllers\Api\V1\ThematicApiController;
use App\Http\Controllers\Api\V1\AboutObservatoryApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'token.api.custom'], function () {
    Route::apiResource('tematicas', ThematicApiController::class)->names('thematics');
    Route::apiResource('posts', PostApiController::class)->names('posts');
    Route::apiResource('categories', CategoryApiController::class)->names('categories');
    Route::apiResource('sobre-observatorio', AboutObservatoryApiController::class)->names('about.observatory');
    // Route::apiResource('sobre-cmpj', CategoryApiController::class)->names('about.cmpj');
    // Route::apiResource('directiva', CategoryApiController::class)->names('directive');
    // Route::apiResource('logos', CategoryApiController::class)->names('logos');
    // Route::apiResource('politica-juventud', CategoryApiController::class)->names('youth-policy');
});
