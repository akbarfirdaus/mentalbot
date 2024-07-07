<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\GejalaController;
use App\Http\Controllers\admin\KonsultasiController;
use App\Http\Controllers\admin\ReportController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\client\clientDashboardController;
use App\Http\Controllers\client\konsultasiClientController;
use App\Http\Controllers\client\reportClientController;
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

Route::view('/', 'welcome');

// Route untuk Auth
Route::get('/sesi', [AuthController::class, 'index'])->name('auth');
Route::post('/sesi', [AuthController::class, 'login'])->name('auth.login');

Route::get('/reg', [AuthController::class, 'create'])->name('register');
Route::post('/reg', [AuthController::class, 'registrasi'])->name('auth.registrasi');

Route::get('/verify/{verify_key}', [AuthController::class, 'verify']);

// Route Untuk Admin
Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/admin/konsultasi', [KonsultasiController::class, 'index'])->name('konsultasi');

Route::get('/admin/data_gejala', [GejalaController::class, 'index'])->name('data_gejala');
Route::post('/admin/data_gejala', [GejalaController::class, 'store'])->name('data_gejala.store');
Route::delete('/admin/data_gejala/{id}', [GejalaController::class, 'deleteGejala'])->name('data_gejala.delete');
Route::get('/admin/data_gejala/{id}/edit', [GejalaController::class, 'edit'])->name('data_gejala.edit');
Route::put('/admin/data_gejala/{id}', [GejalaController::class, 'update'])->name('data_gejala.update');

Route::post('/admin/gejala_lainnya', [GejalaController::class, 'storeGejalaLainnya'])->name('gejala_lainnya.Store');
Route::delete('/admin/gejala_lainnya/{id}', [GejalaController::class, 'deleteGejalaLainnya'])->name('data_gejala.lainnya.delete');
Route::get('/admin/gejala_lainnya/{id}/edit', [GejalaController::class, 'editGejalaLainnya'])->name('data_gejala.lainnya.edit');
Route::put('/admin/gejala_lainnya/{id}', [GejalaController::class, 'updateGejalaLainnya'])->name('data_gejala.lainnya.update');

Route::get('/admin/report', [ReportController::class, 'index'])->name('report');
Route::get('/admin/tabs', [DashboardController::class, 'tabs'])->name('tabs');

// Route untuk Client
Route::get('/client', [clientDashboardController::class, 'index'])->name('dashboard.client');
Route::get('/client/konsultasi', [konsultasiClientController::class, 'index'])->name('konsultasi.client');
Route::get('/client/report', [reportClientController::class, 'index'])->name('report.client');
Route::get('/client/riwayat', [reportClientController::class, 'riwayat'])->name('report.riwayat');


Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:admin'])->group(function () {
    });

    Route::middleware(['role:client'])->group(function () {
    });
});
