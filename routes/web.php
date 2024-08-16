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
