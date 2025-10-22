<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetListingController;
use App\Http\Controllers\AuthController;

Route::get('/test', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'API is working!',
    ]);
});

// Auth routes
Route::post('/register', [AuthController::class, 'apiRegister']);
Route::post('/login', [AuthController::class, 'apiLogin']);

// Pet CRUD routes - YOU NEED ALL OF THESE
Route::get('/petlisting', [PetListingController::class, 'index']);
Route::get('/petlisting/{id}', [PetListingController::class, 'show']);
Route::post('/petlisting', [PetListingController::class, 'store']);      // ← ADD THIS
Route::put('/petlisting/{id}', [PetListingController::class, 'update']);  // ← ADD THIS
Route::delete('/petlisting/{id}', [PetListingController::class, 'destroy']); // ← ADD THIS
Route::delete('/petlisting/{id}', [PetListingController::class, 'destroy']); // ← ADD THIS
