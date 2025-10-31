<?php

use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [SiteController::class, 'index'])->name('home');
Route::get('/layanan', [SiteController::class, 'layanan'])->name('layanan');
Route::get('/struktur-organisasi', [SiteController::class, 'strukturOrganisasi'])->name('struktur');
Route::get('/visi-misi', [SiteController::class, 'visiMisi'])->name('visimisi');
Route::get('/login', [SiteController::class, 'login'])->name('login');