<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;

// Pastikan hanya baris ini yang aktif untuk URL '/'
Route::get('/', [PropertyController::class, 'index']);
Route::get('/create', [PropertyController::class, 'create']);
Route::post('/store', [PropertyController::class, 'store']);