<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;

// Route untuk Auth (Login/Register)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Group Route dengan Middleware Sanctum (Wajib Login/Token)
Route::middleware('auth:sanctum')->group(function () {
    
    // --- SISWA ---
    Route::post('/siswa/create', [SiswaController::class, 'create']);
    Route::get('/siswa/read', [SiswaController::class, 'read']);
    Route::put('/siswa/update/{id}', [SiswaController::class, 'update']); // Pakai {id} agar tahu mana yang diedit
    Route::delete('/siswa/delete/{id}', [SiswaController::class, 'delete']);

    // --- GURU ---
    Route::post('/guru/create', [GuruController::class, 'create']);
    Route::get('/guru/read', [GuruController::class, 'read']);
    Route::put('/guru/update/{id}', [GuruController::class, 'update']);
    Route::delete('/guru/delete/{id}', [GuruController::class, 'delete']);

    // --- KELAS ---
    Route::post('/kelas/create', [KelasController::class, 'create']);
    Route::get('/kelas/read', [KelasController::class, 'read']);
    Route::put('/kelas/update/{id}', [KelasController::class, 'update']);
    Route::delete('/kelas/delete/{id}', [KelasController::class, 'delete']);
    
    // Logout
    Route::post('/logout', [AuthController::class, 'logout']);
});