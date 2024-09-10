<?php

use App\Http\Controllers\ImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::name('images.')->prefix('images')->group(function () {
        Route::post('/', [ImageController::class, 'store'])->name('store');
    });

});
