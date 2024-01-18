<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// print
Route::get('/print/{id}', [PdfController::class, 'generatePdf'])->name('generate.pdf');

// Authentikasi
Route::get('/login', [AuthController::class, 'login_view'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout']);
// Authentikasi

Route::middleware(['authentikasi'])->group(function () {
    Route::get('/', [BerandaController::class, 'index']);

    Route::get('/transaksi', [TransaksiController::class, 'index']);

    Route::prefix('produk')->group(function () {
        Route::get('/', [ProdukController::class, 'index']);
        Route::post('/insert', [ProdukController::class, 'insert']);
        Route::get('/delete/{id}', [ProdukController::class, 'delete']);
        Route::put('/update/{id}', [ProdukController::class, 'update']);
    });

    Route::prefix('pengaturan-sistem')->group(function () {
        Route::prefix('pelanggan')->group(function () {
            Route::get('/', [PelangganController::class, 'index']);
            Route::post('/insert', [PelangganController::class, 'insert']);
            Route::get('/delete/{id}', [PelangganController::class, 'delete']);
            Route::put('/update/{id}', [PelangganController::class, 'update']);
        });
        Route::prefix('pegawai')->group(function () {
            Route::get('/', [PegawaiController::class, 'index']);
        });
    });
});
