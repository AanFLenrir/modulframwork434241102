<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Admin\JenisHewanController;
use App\Http\Controllers\Admin\PemilikController;
use App\Http\Controllers\Admin\RasHewanController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\KategoriKlinisController;
use App\Http\Controllers\Admin\KodeTindakanTerapiController;
use App\Http\Controllers\Admin\PetController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleUserController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Resepsionis\DashboardResepsionisController;
use App\Http\Controllers\Dokter\DashboardDokterController;
use App\Http\Controllers\Perawat\DashboardPerawatController;
use App\Http\Controllers\Pemilik\DashboardPemilikController;

Route::get('/cek-koneksi', function () {
    try {
        DB::connection()->getPdo();
        return "Koneksi ke database berhasil: " . DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        return "Koneksi gagal: " . $e->getMessage();
    }
});

// halaman utama
Route::get('/', [SiteController::class, 'home'])->name('site.home');
Route::get('/layanan', [SiteController::class, 'layanan'])->name('layanan');
Route::get('/kontak', [SiteController::class, 'kontak'])->name('kontak');
Route::post('/kontak', [SiteController::class, 'submitKontak'])->name('kontak.submit');
Route::get('/struktur', [SiteController::class, 'struktur'])->name('struktur');

// Authentication routes
Auth::routes(); // <-- ini yang buat login/register bawaan Laravel

// admin
//akses administrator
Route::middleware('isAdministrator')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardAdminController::class, 'index'])->name('dashboard');
    Route::get('/jenis-hewan', [App\Http\Controllers\Admin\JenisHewanController::class, 'index'])->name('jenis-hewan.index');
    Route::POST('/jenis-hewan/create', [App\Http\Controllers\Admin\JenisHewanController::class, 'create'])->name('jenis-hewan.create');
    Route::post('/jenis-hewan/store', [App\Http\Controllers\Admin\JenisHewanController::class, 'store'])->name('jenis-hewan.store');
     Route::get('/jenis-hewan/edit', [App\Http\Controllers\Admin\JenisHewanController::class, 'edit'])->name('jenis-hewan.edit');
     Route::post('/jenis-hewan/destroy', [App\Http\Controllers\Admin\JenisHewanController::class, 'destroy'])->name('jenis-hewan.destroy');

    Route::get('/pemilik', [App\Http\Controllers\Admin\PemilikController::class, 'index'])->name('pemilik.index');
});

//dokter
Route::middleware('isDokter')->group(function () {
    Route::get('/dokter/dashboard', [DashboardDokterController::class, 'index'])
        ->name('dokter.dashboard');
});

//perawat
Route::middleware('isPerawat')->group(function () {
    Route::get('/perawat/dashboard', [DashboardPerawatController::class, 'index'])
        ->name('perawat.dashboard');
});

// resepsionis
Route::middleware('isResepsionis')->group(function () {
    Route::get('/resepsionis/dashboard', [DashboardResepsionisController::class, 'index'])->name('resepsionis.dashboard');
    Route::get('/resepsionis/transaksi', function () {
        return 'Halaman Transaksi Resepsionis (dummy)';
    })->name('resepsionis.transaksi.index');
});

//pemilik
Route::middleware('isPemilik')->group(function () {
    Route::get('/pemilik/dashboard', [DashboardPemilikController::class, 'index'])
        ->name('pemilik.dashboard');
});

// dashboard & admin
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/jenis-hewan', [JenisHewanController::class, 'index'])->name('admin.jenis-hewan.index');
Route::get('/admin/pemilik', [PemilikController::class, 'index'])->name('admin.pemilik.index');
Route::get('/admin/ras-hewan', [RasHewanController::class, 'index']);
Route::get('/admin/kategori', [KategoriController::class, 'index']);
Route::get('/admin/kategori-klinis', [KategoriKlinisController::class, 'index']);
Route::get('/admin/kode-tindakan-terapi', [KodeTindakanTerapiController::class, 'index']);
Route::get('/admin/pet', [PetController::class, 'index']);
Route::get('/admin/role', [RoleController::class, 'index']);
Route::get('/admin/user', [UserController::class, 'index']);
Route::get('/admin/role-user', [RoleUserController::class, 'index']);

// ini semua diatas harus masuk middlaware isadmintrator 