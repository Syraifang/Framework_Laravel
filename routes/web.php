<?php

use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\JenisHewanController;
use App\Http\Controllers\Admin\RasHewanController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\KategoriKlinisController;
use App\Http\Controllers\Admin\KodeTindakanTerapiController;
use App\Http\Controllers\Admin\PetController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cek-koneksi', [SiteController::class, 'cekKoneksi']);

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/layanan', [SiteController::class, 'layanan'])->name('layanan');
Route::get('/struktur-organisasi', [SiteController::class, 'strukturOrganisasi'])->name('struktur');
Route::get('/visi-misi', [SiteController::class, 'visiMisi'])->name('visimisi');

Route::get('/admin/jenis-hewan', [JenisHewanController::class, 'index'])->name('admin.jenis-hewan.index');
Route::get('/admin/ras-hewan', [RasHewanController::class, 'index'])->name('admin.ras-hewan.index');
Route::get('/admin/kategori', [KategoriController::class, 'index'])->name('admin.kategori.index');
Route::get('/admin/kategori-klinis', [KategoriKlinisController::class, 'index'])->name('admin.kategori-klinis.index');
Route::get('/admin/kode-tindakan-terapi', [KodeTindakanTerapiController::class, 'index'])->name('admin.kode-tindakan-terapi.index');
Route::get('/admin/pet', [PetController::class, 'index'])->name('admin.pet.index');
Route::get('/admin/role', [RoleController::class, 'index'])->name('admin.role.index');
Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
