<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/events', [EventController::class, 'index']);        // Admin or public listing
    Route::post('/events', [EventController::class, 'store']);       // Admin only
    Route::get('/events/{event}', [EventController::class, 'show']); // Details
    Route::put('/events/{event}', [EventController::class, 'update']); // Admin only
    Route::delete('/events/{event}', [EventController::class, 'destroy']); // Admin only
});