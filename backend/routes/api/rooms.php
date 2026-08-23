<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\RoomController;

Route::get('/', [RoomController::class, 'index'])->name('index');
Route::post('/', [RoomController::class, 'store'])->name('store');