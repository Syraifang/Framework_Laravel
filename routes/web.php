<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\HomeController;

// punya admin
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\JenisHewanController;
use App\Http\Controllers\Admin\RasHewanController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\KategoriKlinisController;
use App\Http\Controllers\Admin\KodeTindakanTerapiController;
use App\Http\Controllers\Admin\PetController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;


// punya resep
use App\Http\Controllers\Resepsionis\DashboardResepsionisController;

//pemilik
use App\Http\Controllers\Pemilik\DashboardPemilikController;


Route::get('/', [SiteController::class, 'index'])->name('beranda');
Route::get('/cek-koneksi', [SiteController::class, 'cekKoneksi']);
Route::get('/layanan', [SiteController::class, 'layanan'])->name('layanan');
Route::get('/struktur-organisasi', [SiteController::class, 'strukturOrganisasi'])->name('struktur');
Route::get('/visi-misi', [SiteController::class, 'visiMisi'])->name('visimisi');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//middleware
Route::middleware(['auth', 'isAdministrator'])->group(function () {

    Route::get('/admin/dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/jenis-hewan', [JenisHewanController::class, 'index'])->name('admin.jenis-hewan.index');
    Route::get('/admin/ras-hewan', [RasHewanController::class, 'index'])->name('admin.ras-hewan.index');
    Route::get('/admin/kategori', [KategoriController::class, 'index'])->name('admin.kategori.index');
    Route::get('/admin/kategori-klinis', [KategoriKlinisController::class, 'index'])->name('admin.kategori-klinis.index');
    Route::get('/admin/kode-tindakan-terapi', [KodeTindakanTerapiController::class, 'index'])->name('admin.kode-tindakan-terapi.index');
    Route::get('/admin/pet', [PetController::class, 'index'])->name('admin.pet.index');
    Route::get('/admin/role', [RoleController::class, 'index'])->name('admin.role.index');
    Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user.index');

    Route::get('/admin/jenis-hewan', [JenisHewanController::class, 'index'])->name('admin.jenis-hewan.index');
    
    Route::get('/admin/jenis-hewan/create', [JenisHewanController::class, 'create'])->name('admin.jenis-hewan.create');
    Route::post('/admin/jenis-hewan', [JenisHewanController::class, 'store'])->name('admin.jenis-hewan.store');
    
    Route::get('/admin/jenis-hewan/{id}/edit', [JenisHewanController::class, 'edit'])->name('admin.jenis-hewan.edit');
    Route::put('/admin/jenis-hewan/{id}', [JenisHewanController::class, 'update'])->name('admin.jenis-hewan.update');

    Route::delete('/admin/jenis-hewan/{id}', [JenisHewanController::class, 'destroy'])->name('admin.jenis-hewan.destroy');
});

Route::middleware(['auth', 'isResepsionis'])->group(function () {
    Route::get('/resepsionis/dashboard', [DashboardResepsionisController::class, 'index'])->name('resepsionis.dashboard');
});

Route::middleware(['auth', 'isPemilik'])->group(function () {
    Route::get('/pemilik/dashboard', [DashboardPemilikController::class, 'index'])->name('pemilik.dashboard');
});