<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClothingItemController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;



// User info route (requires authentication)
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

//Authentication routes (register & login)
Route::post('/register', [RegisteredUserController::class, 'store']);  // Registration
Route::post('/login', [AuthenticatedSessionController::class, 'store']); // Login

// User profile route (requires authentication)
Route::middleware('auth:sanctum')->get('/user/profile', [AuthenticatedSessionController::class, 'getProfile']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth:sanctum'); // Logout

// Clothing Items Routes (Require Authentication)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/clothing-items', [ClothingItemController::class, 'index']);
    Route::post('/clothing-items', [ClothingItemController::class, 'store']);
    Route::put('/clothing-items/{id}', [ClothingItemController::class, 'update']);
    Route::delete('/clothing-items/{id}', [ClothingItemController::class, 'destroy']);
});
