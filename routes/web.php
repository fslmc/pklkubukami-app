<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main.homepage');
});

Route::get('/dashboard', function () {
    return view('layouts.adminDashboard');
});

Route::prefix('artikel')->group(function () {
    Route::get('/index', [App\Http\Controllers\ArtikelController::class, 'index'])->name('artikel.index');
    Route::get('/create', [App\Http\Controllers\ArtikelController::class, 'create'])->name('artikel.create');
    Route::post('/post', [App\Http\Controllers\ArtikelController::class, 'post'])->name('artikel.post');
    Route::get('/edit/{id}', [App\Http\Controllers\ArtikelController::class, 'edit'])->name('artikel.edit');
    Route::put('/update/{id}', [App\Http\Controllers\ArtikelController::class, 'update'])->name('artikel.update');
    Route::delete('/delete/{id}', [App\Http\Controllers\ArtikelController::class, 'delete'])->name('artikel.delete');
});

Route::prefix('siswa')->group(function (){
    Route::get('/',[App\Http\Controllers\SiswaController::class,'index'])->name('siswa.index');
    Route::get('/create', [App\Http\Controllers\SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/post', [App\Http\Controllers\SiswaController::class, 'post'])->name('siswa.post');
    Route::get('/edit/{id}', [App\Http\Controllers\SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/update/{id}', [App\Http\Controllers\SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/delete/{id}', [App\Http\Controllers\SiswaController::class, 'delete'])->name('siswa.delete');
});

Route::prefix('gallery')->group(function () {
    Route::get('/index', [App\Http\Controllers\GalleryController::class, 'index'])->name('gallery.index');
    Route::get('/create', [App\Http\Controllers\GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/post', [App\Http\Controllers\GalleryController::class, 'post'])->name('gallery.post');
    Route::get('/edit/{id}', [App\Http\Controllers\GalleryController::class, 'edit'])->name('gallery.edit');
    Route::put('/update/{id}', [App\Http\Controllers\GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/delete/{id}', [App\Http\Controllers\GalleryController::class, 'delete'])->name('gallery.delete');
});

Route::prefix('sekolah')->group(function () {
    Route::get('/index', [App\Http\Controllers\SekolahController::class, 'index'])->name('sekolah.index');
    Route::get('/create', [App\Http\Controllers\SekolahController::class, 'create'])->name('sekolah.create');
    Route::post('/post', [App\Http\Controllers\SekolahController::class, 'post'])->name('sekolah.post');
    Route::get('/edit/{id}', [App\Http\Controllers\SekolahController::class, 'edit'])->name('sekolah.edit');
    Route::put('/update/{id}', [App\Http\Controllers\SekolahController::class, 'update'])->name('sekolah.update');
    Route::delete('/delete/{id}', [App\Http\Controllers\SekolahController::class, 'delete'])->name('sekolah.delete');
});
