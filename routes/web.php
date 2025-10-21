<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetListingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [AuthController::class, 'showRegister'])->name('show.register');
Route::get('login', [AuthController::class, 'showLogin'])->name('show.login');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login');

// Pet Management Routes (Admin/Backend)
Route::resource('pets', PetController::class);

// Public Pet Listing Routes (Frontend)
Route::get('/petlisting', [PetListingController::class, 'index'])->name('petlisting.index');