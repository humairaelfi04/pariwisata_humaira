<?php

use App\Http\Middleware\RoleAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\UmkmController;
use App\Http\Controllers\PariwisataController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\ReviewPublicController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\DestinasiController;
use App\Http\Controllers\Public\UmkmPublicController;
use App\Http\Controllers\Public\EventPublicController;



// Halaman utama (Frontend)

Route::get('/pariwisata/{id}', [PariwisataController::class, 'show'])->name('pariwisata.show');

// Form input tempat wisata (akses terbatas)
Route::get('/create-pariwisata', [PariwisataController::class, 'create'])->name('pariwisata.create')->middleware('auth');

// Simpan data wisata (POST)
Route::post('/pariwisata/store', [PariwisataController::class, 'store'])->name('pariwisata.store')->middleware('auth');

// Login dan Logout
Route::get('/login', [AuthController::class, 'loginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Edit tempat wisata (akses terbatas admin)
Route::get('/pariwisata/{id}/edit', [PariwisataController::class, 'edit'])->name('pariwisata.edit')->middleware('auth', RoleAdmin::class);
Route::put('/pariwisata/{id}', [PariwisataController::class, 'update'])->name('pariwisata.update')->middleware('auth', RoleAdmin::class);

// Hapus data wisata
Route::delete('/pariwisata/{id}', [PariwisataController::class, 'destroy'])->name('pariwisata.destroy')->middleware('auth');

// Pencarian wisata
Route::get('/search', [PariwisataController::class, 'search'])->name('pariwisata.search');



Route::get('/', [FrontendController::class, 'index'])->name('home');

Route::get('/destinasi/create', [FrontendController::class, 'create'])->name('destinasi.create')->middleware('auth');
Route::get('/destinasi/{id}', [FrontendController::class, 'show'])->name('destinasi.show');

//Route::post('/review/store', [ReviewPublicController::class, 'store'])->name('review.store');


Route::middleware(['auth', RoleAdmin::class])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard'); // Pastikan view ini ada
    })->name('admin.dashboard');

    Route::get('/destinasi', [DestinasiController::class, 'index'])->name('admin.destinasi.index');
});


Route::get('/kategori', [KategoriController::class, 'index'])->name('admin.kategori.index');

// Route::resource('/event', EventController::class)->names([
//     'index' => 'admin.event.index',
//     'create' => 'admin.event.create',
//     'store' => 'admin.event.store',
//     'edit' => 'admin.event.edit',
//     'update' => 'admin.event.update',
//     'destroy' => 'admin.event.destroy',
//     'show' => 'admin.event.show',
// ]);


Route::prefix('kategori')->name('admin.kategori.')->group(function () {
    Route::get('/', [KategoriController::class, 'index'])->name('index');
    Route::get('/create', [KategoriController::class, 'create'])->name('create');
    Route::post('/', [KategoriController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [KategoriController::class, 'edit'])->name('edit');
    Route::put('/{id}', [KategoriController::class, 'update'])->name('update');
    Route::delete('/{id}', [KategoriController::class, 'destroy'])->name('destroy');
});


Route::resource('destinasi', DestinasiController::class)->middleware(['auth', App\Http\Middleware\RoleAdmin::class]);

Route::prefix('admin')->middleware(['auth', RoleAdmin::class])->group(function () {
    Route::resource('event', EventController::class)->names('admin.event');
});

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/review', [ReviewController::class, 'index'])->name('review.index');
    Route::put('/review/{id}/status', [ReviewController::class, 'updateStatus'])->name('review.updateStatus');
    Route::delete('/review/{id}', [ReviewController::class, 'destroy'])->name('review.destroy');
});

Route::prefix('admin')->middleware(['auth', RoleAdmin::class])->name('admin.')->group(function () {
    Route::get('/umkm', [UmkmController::class, 'index'])->name('umkm.index');
});
Route::get('/umkm', [UmkmPublicController::class, 'index'])->name('public.umkm.index');
Route::get('/umkm/{id}', [UmkmPublicController::class, 'show'])->name('public.umkm.show');

Route::get('/event', [EventPublicController::class, 'index'])->name('public.events.index');
Route::get('/event/{id}', [EventPublicController::class, 'show'])->name('public.events.show');

Route::put('/review/{id}/status', [ReviewController::class, 'updateStatus'])->name('review.updateStatus');
Route::post('/review', [ReviewPublicController::class, 'store'])->name('review.store')->middleware('auth');

Route::middleware(['auth', \App\Http\Middleware\RoleAdmin::class])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('umkm', UmkmController::class); // ini akan otomatis menyediakan:
    // admin.umkm.index
    // admin.umkm.create
    // admin.umkm.store
    // admin.umkm.edit
    // admin.umkm.update
    // admin.umkm.destroy
    // admin.umkm.show
});
