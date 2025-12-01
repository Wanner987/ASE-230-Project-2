<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\API\V1'], function () {
    // Register resources but handle store/update separately so we can apply
    // bearer token (sanctum) middleware to POST/PUT routes while allowing
    // public POST /users for registration.

    // Artists
    Route::apiResource('artists', ArtistController::class)->except(['store', 'update']);
    Route::post('artists', [ArtistController::class, 'store'])->middleware('auth:sanctum');
    Route::match(['put', 'patch'], 'artists/{artist}', [ArtistController::class, 'update'])->middleware('auth:sanctum');

    // Songs
    Route::apiResource('songs', SongController::class)->except(['store', 'update']);
    Route::post('songs', [SongController::class, 'store'])->middleware('auth:sanctum');
    Route::match(['put', 'patch'], 'songs/{song}', [SongController::class, 'update'])->middleware('auth:sanctum');

    // Playlists
    Route::apiResource('playlists', PlaylistController::class)->except(['store', 'update']);
    Route::post('playlists', [PlaylistController::class, 'store'])->middleware('auth:sanctum');
    Route::match(['put', 'patch'], 'playlists/{playlist}', [PlaylistController::class, 'update'])->middleware('auth:sanctum');

    // Users: allow public registration (store) but protect update
    Route::apiResource('users', UserController::class)->except(['store', 'update']);
    Route::post('users', [UserController::class, 'store']); // public registration
    Route::match(['put', 'patch'], 'users/{user}', [UserController::class, 'update'])->middleware('auth:sanctum');
});