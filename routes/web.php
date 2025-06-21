<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PariwisataController;
use App\Http\Middleware\RoleAdmin;

// Halaman utama (Frontend)
Route::get('/', [PariwisataController::class, 'homepage']);
Route::get('/pariwisata/{id}', [PariwisataController::class, 'show'])->name('pariwisata.show');

// Form input tempat wisata (akses terbatas)
Route::get('/create-pariwisata', [PariwisataController::class, 'create'])->name('pariwisata.create')->middleware('auth');

// Simpan data wisata (POST)
Route::post('/pariwisata/store', [PariwisataController::class, 'store'])->name('pariwisata.store')->middleware('auth');

// Login dan Logout
Route::get('/login', [AuthController::class, 'loginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Edit tempat wisata (akses terbatas admin)
Route::get('/pariwisata/{id}/edit', [PariwisataController::class, 'edit'])->name('pariwisata.edit')->middleware('auth', RoleAdmin::class);
Route::put('/pariwisata/{id}', [PariwisataController::class, 'update'])->name('pariwisata.update')->middleware('auth', RoleAdmin::class);

// Hapus data wisata
Route::delete('/pariwisata/{id}', [PariwisataController::class, 'destroy'])->name('pariwisata.destroy')->middleware('auth');

// Pencarian wisata
Route::get('/search', [PariwisataController::class, 'search'])->name('pariwisata.search');
