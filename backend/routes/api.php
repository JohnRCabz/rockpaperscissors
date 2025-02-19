<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CorsMiddleware;

Route::middleware([CorsMiddleware::class])->group(function () {
    Route::options('/play', function () {
        return response()->json([], 200);
    });
    Route::post('/play', [GameController::class, 'play']);
});
