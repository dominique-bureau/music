<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\BandController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->group(function () {
    Route::apiResource('artists', ArtistController::class)->only(['index', 'show'])->whereUuid('artist');
    Route::apiResource('bands', BandController::class)->only(['index', 'show'])->whereUuid('band');
});
