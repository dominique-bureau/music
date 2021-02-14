<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\BandController;
use App\Http\Controllers\LyricController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\InstrumentController;
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
    Route::post('/login', 'App\Http\Controllers\AuthController@login')->name('login');
    Route::post('/register', 'App\Http\Controllers\AuthController@register')->name('register');

    Route::apiResource('artists', ArtistController::class)->only(['index', 'show'])->whereUuid('artist');
    Route::apiResource('instruments', InstrumentController::class)->only(['index', 'show'])->whereUuid('instrument');
    Route::apiResource('bands', BandController::class)->only(['index', 'show'])->whereUuid('band');
    Route::apiResource('albums', AlbumController::class)->only(['index', 'show'])->whereUuid('album');
    Route::apiResource('songs', SongController::class)->only(['index', 'show'])->whereUuid('song');
    Route::apiResource('lyrics', LyricController::class)->only(['index', 'show'])->whereUuid('lyric');
});

Route::group(['prefix' => 'v1', 'middleware' => 'auth:sanctum'], function() {
    Route::apiResource('artists', ArtistController::class)->except(['index', 'show'])->whereUuid('artist');
});



Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');
    Route::get('/events', 'App\Http\Controllers\EventController@list');
});
