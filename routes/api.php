<?php

use App\Http\Controllers\Api\V1\AboutCmpjController;
use App\Http\Controllers\Api\V1\DirectiveController;
use App\Http\Controllers\Api\V1\GradeController;
use App\Http\Controllers\Api\V1\LogoApiController;
use App\Http\Controllers\Api\V1\SettingController;
use App\Http\Controllers\Api\V1\SlideController;
use App\Http\Controllers\Api\V1\YouthPolicyController;
use App\Http\Controllers\Api\V1\YouthStrategyController;
use App\Http\Controllers\Api\V1\YoutObservatoryController;
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

Route::apiResource('youtObservatory', YoutObservatoryController::class)->only(['index']);

Route::apiResource('cmpj', AboutCmpjController::class)->only(['index']);

Route::apiResource('logo', LogoApiController::class)->only(['index']);

Route::apiResource('youthPolicy', YouthPolicyController::class)->only(['index']);
Route::apiResource('youthStrategy', YouthStrategyController::class)->only(['index']);
Route::apiResource('slide', SlideController::class)->only(['index']);
Route::apiResource('directive', DirectiveController::class)->only(['index']);
Route::apiResource('setting', SettingController::class)->only(['index']);
// Route::apiResource('thematic',ThematicController::class)->only(['index']);
Route::apiResource('grade', GradeController::class)->only(['index']);
