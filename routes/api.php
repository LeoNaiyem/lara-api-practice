<?php

use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::apiResource('products', ProductController::class);
Route::apiResource('patients', PatientController::class);
Route::apiResource('posts', PostController::class);
Route::apiResource('bookings', BookingController::class);
