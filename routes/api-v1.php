<?php

use App\Http\Controllers\Api\V1\PostApiController;
use App\Http\Controllers\Api\v1\ThematicApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    Route::apiResource('posts', PostApiController::class)->names('posts');
    Route::apiResource('tematicas', ThematicApiController::class)->names('thematics');
});
