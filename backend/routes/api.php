<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('/v1')->group(function () {
    Route::prefix('/auth')->name('auth.')->group(function() {
        require __DIR__ . '/api/telegramAuth.php';
    });
});