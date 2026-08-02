<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\TelegramAuthController;

Route::post('/', [TelegramAuthController::class, 'auth'])->name('auth');