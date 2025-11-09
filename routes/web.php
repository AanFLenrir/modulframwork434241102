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
Route::middleware('isAdministrator')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');

    // User
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');

    // Role (Tidak pake)
    Route::get('/role', [RoleController::class, 'index'])->name('role.index');
    Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('/role/store', [RoleController::class, 'store'])->name('role.store');

    // Role User (Manajemen Role)
    Route::get('role-user', [RoleUserController::class, 'index'])->name('role-user.index');
    Route::get('role-user/create', [RoleUserController::class, 'create'])->name('role-user.create');
    Route::post('role-user/store', [RoleUserController::class, 'store'])->name('role-user.store');
    Route::delete('role-user/{id}', [RoleUserController::class, 'destroy'])->name('role-user.destroy');

    // Jenis Hewan
    Route::get('/jenis-hewan', [JenisHewanController::class, 'index'])->name('jenis-hewan.index');
    Route::get('/jenis-hewan/create', [JenisHewanController::class, 'create'])->name('jenis-hewan.create');
    Route::post('/jenis-hewan/store', [JenisHewanController::class, 'store'])->name('jenis-hewan.store');

    // Ras Hewan
    Route::get('/ras-hewan', [RasHewanController::class, 'index'])->name('ras-hewan.index');
    Route::get('/ras-hewan/create', [RasHewanController::class, 'create'])->name('ras-hewan.create');
    Route::post('/ras-hewan/store', [RasHewanController::class, 'store'])->name('ras-hewan.store');

    // Pemilik
    Route::get('/pemilik', [PemilikController::class, 'index'])->name('pemilik.index');
    Route::get('/pemilik/create', [PemilikController::class, 'create'])->name('pemilik.create');
    Route::post('/pemilik/store', [PemilikController::class, 'store'])->name('pemilik.store');

    // Pet
    Route::get('/pet', [PetController::class, 'index'])->name('pet.index');
    Route::get('/pet/create', [PetController::class, 'create'])->name('pet.create');
    Route::post('/pet/store', [PetController::class, 'store'])->name('pet.store');

    // Kategori
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');

    // Kategori Klinis
    Route::get('/kategori-klinis', [KategoriKlinisController::class, 'index'])->name('kategori-klinis.index');
    Route::get('/kategori-klinis/create', [KategoriKlinisController::class, 'create'])->name('kategori-klinis.create');
    Route::post('/kategori-klinis/store', [KategoriKlinisController::class, 'store'])->name('kategori-klinis.store');

    // Kode Tindakan Terapi
    Route::get('/kode-tindakan-terapi', [KodeTindakanTerapiController::class, 'index'])->name('kode-tindakan-terapi.index');
    Route::get('/kode-tindakan-terapi/create', [KodeTindakanTerapiController::class, 'create'])->name('kode-tindakan-terapi.create');
    Route::post('/kode-tindakan-terapi/store', [KodeTindakanTerapiController::class, 'store'])->name('kode-tindakan-terapi.store');
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