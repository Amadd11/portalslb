<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\FasilitasController;

Route::get('/', [FrontController::class, 'index'])->name('front.index');


Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/search', [BeritaController::class, 'search'])->name('berita.search');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');

Route::get('/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas.index');

Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
Route::get('/foto', [GaleriController::class, 'index'])->name('galeri.foto');
Route::get('/video', [GaleriController::class, 'video'])->name('galeri.video');
Route::get('/sekolah', [SekolahController::class, 'index'])->name('sekolah.index');
Route::post('/komentar', [KomentarController::class, 'store'])->name('komentar.store');
