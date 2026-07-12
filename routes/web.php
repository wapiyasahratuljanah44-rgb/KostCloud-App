<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\AuthController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::get('/', function () {
    return auth()->check() ? redirect('/dashboard') : view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [PropertyController::class, 'index']);
    Route::get('/kost/create', [PropertyController::class, 'create']);
    Route::post('/kost/store', [PropertyController::class, 'store']);
    Route::get('/kost/{id}', [PropertyController::class, 'show']);
    Route::get('/kost/{id}/edit', [PropertyController::class, 'edit']);
    Route::put('/kost/{id}', [PropertyController::class, 'update']);
    Route::delete('/kost/{id}', [PropertyController::class, 'destroy']);
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::put('/profile', [AuthController::class, 'updateProfile']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
