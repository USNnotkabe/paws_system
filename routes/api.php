<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\PetListingController;
use App\Http\Controllers\AuthController;

Route::get('/test', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'API is working!',
    ]);
});

// Auth API Routes (No CSRF required)
Route::post('/register', [AuthController::class, 'apiRegister']);
Route::post('/login', [AuthController::class, 'apiLogin']);

// Pet Listing
Route::get('/petlisting', [PetListingController::class, 'index']);
