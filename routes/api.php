<?php


use App\Http\Controllers\Api\V1\PostApiController;
use App\Http\Resources\Api\V1\PostResource;


use App\Http\Controllers\Api\V1\YoutObservatoryController;

use App\Http\Controllers\Api\V1\AboutCmpjController;



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

Route::apiResource('post',PostApiController::class)->only(['index']);


Route::apiResource('youtObservatory', YoutObservatoryController::class)->only(['index']);

Route::apiResource('cmpj',AboutCmpjController::class)->only(['index']);


