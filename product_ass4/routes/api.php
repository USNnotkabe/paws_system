<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| These routes are loaded by the RouteServiceProvider within a group
| which is assigned the "api" middleware group. Enjoy building your API!
|--------------------------------------------------------------------------
*/

// 🧾 Authentication Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// 🔒 Routes that require authentication
Route::middleware('auth:sanctum')->group(function () {

    // Get the authenticated user
    Route::get('/user', function (Request $request) {
        return response()->json($request->user());
    });

    // 🛍️ Product Routes
    Route::get('/products', [ProductController::class, 'index']);           // List all products
    Route::post('/products', [ProductController::class, 'store']);          // Create new product
    Route::get('/products/{id}', [ProductController::class, 'show']);       // Show specific product
    Route::put('/products/{id}', [ProductController::class, 'update']);     // Update product
    Route::patch('/products/{id}', [ProductController::class, 'update']);   // Partial update
    Route::delete('/products/{id}', [ProductController::class, 'destroy']); // Delete product
});
