<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



use App\Http\Controllers\Api\V1\PostController;

use App\Http\Controllers\Api\V1\GradeController;
use App\Http\Controllers\Api\V1\SlideController;
use App\Http\Controllers\Api\V1\LogoApiController;
use App\Http\Controllers\Api\V1\PostApiController;
use App\Http\Controllers\Api\V1\SettingController;
use App\Http\Controllers\Api\V1\ThematicController;
use App\Http\Controllers\Api\V1\AboutCmpjController;
use App\Http\Controllers\Api\V1\DirectiveController;

use App\Http\Controllers\Api\V1\YouthPolicyController;
use App\Http\Controllers\Api\V1\YouthStrategyController;
use App\Http\Controllers\Api\V1\YoutObservatoryController;

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

Route::apiResource('posts', PostApiController::class)->names(['api.v1.posts']);

