<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\UserManagementController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('main.homepage');
});

// Rute untuk mengakses blogs
Route::get('/blogs',[App\Http\Controllers\MainController::class,'blogs'])->name('main.blogs');

// Rute untuk mengakses about
Route::get('/about',[App\Http\Controllers\MainController::class,'about'])->name('main.about');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::prefix('dashboard')->middleware(['auth', 'role:admin,user'])->group(function (){
Route::prefix('dashboard')->group(function (){

    Route::get('/', function () {
        return view('layouts.adminDashboard');
    })->name('dashboard');

    // List Artikel/Blog
    Route::prefix('artikel')->group(function () {
        Route::get('/index', [App\Http\Controllers\ArtikelController::class, 'index'])->name('artikel.index');
        Route::get('/create', [App\Http\Controllers\ArtikelController::class, 'create'])->name('artikel.create');
        Route::post('/post', [App\Http\Controllers\ArtikelController::class, 'post'])->name('artikel.post');
        Route::get('/edit/{id}', [App\Http\Controllers\ArtikelController::class, 'edit'])->name('artikel.edit');
        Route::put('/update/{id}', [App\Http\Controllers\ArtikelController::class, 'update'])->name('artikel.update');
        Route::delete('/delete/{id}', [App\Http\Controllers\ArtikelController::class, 'delete'])->name('artikel.delete');
    });

    // List Siswa pkl
    Route::prefix('siswa')->group(function (){
        Route::get('/',[App\Http\Controllers\SiswaController::class,'index'])->name('siswa.index');
        Route::get('/create', [App\Http\Controllers\SiswaController::class, 'create'])->name('siswa.create');
        Route::post('/post', [App\Http\Controllers\SiswaController::class, 'post'])->name('siswa.post');
        Route::get('/edit/{id}', [App\Http\Controllers\SiswaController::class, 'edit'])->name('siswa.edit');
        Route::put('/update/{id}', [App\Http\Controllers\SiswaController::class, 'update'])->name('siswa.update');
        Route::delete('/delete/{id}', [App\Http\Controllers\SiswaController::class, 'delete'])->name('siswa.delete');
    });

    // List Testimoni
    Route::prefix('testimoni')->group(function (){
        Route::get('/',[App\Http\Controllers\TestimoniController::class,'index'])->name('testimoni.index');
        Route::get('/create', [App\Http\Controllers\TestimoniController::class, 'create'])->name('testimoni.create');
        Route::post('/post', [App\Http\Controllers\TestimoniController::class, 'post'])->name('testimoni.post');
        Route::get('/edit/{id}', [App\Http\Controllers\TestimoniController::class, 'edit'])->name('testimoni.edit');
        Route::put('/update/{id}', [App\Http\Controllers\TestimoniController::class, 'update'])->name('testimoni.update');
        Route::delete('/delete/{id}', [App\Http\Controllers\TestimoniController::class, 'delete'])->name('testimoni.delete');
    });

    // List Galeri
    Route::prefix('gallery')->group(function () {
        Route::get('/index', [App\Http\Controllers\GalleryController::class, 'index'])->name('gallery.index');
        Route::get('/create', [App\Http\Controllers\GalleryController::class, 'create'])->name('gallery.create');
        Route::post('/post', [App\Http\Controllers\GalleryController::class, 'post'])->name('gallery.post');
        Route::get('/edit/{id}', [App\Http\Controllers\GalleryController::class, 'edit'])->name('gallery.edit');
        Route::put('/update/{id}', [App\Http\Controllers\GalleryController::class, 'update'])->name('gallery.update');
        Route::delete('/delete/{id}', [App\Http\Controllers\GalleryController::class, 'delete'])->name('gallery.delete');

    });

    // List Sekolah
    Route::prefix('sekolah')->group(function () {
        Route::get('/index', [App\Http\Controllers\SekolahController::class, 'index'])->name('sekolah.index');
        Route::get('/create', [App\Http\Controllers\SekolahController::class, 'create'])->name('sekolah.create');
        Route::post('/post', [App\Http\Controllers\SekolahController::class, 'post'])->name('sekolah.post');
        Route::get('/edit/{id}', [App\Http\Controllers\SekolahController::class, 'edit'])->name('sekolah.edit');
        Route::put('/update/{id}', [App\Http\Controllers\SekolahController::class, 'update'])->name('sekolah.update');
        Route::delete('/delete/{id}', [App\Http\Controllers\SekolahController::class, 'delete'])->name('sekolah.delete');
    });

    // Upload Tugas ke Google Drive
    Route::prefix('upload-tugas')->group(function () {
        Route::post('/upload', [FileUploadController::class, 'store'])->name('file.upload');
        Route::get('/create', [FileUploadController::class, 'create'])->name('file.create');
        Route::get('/history', [FileUploadController::class, 'index'])->name('file.history');
    });

    // Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::prefix('admin')->group(function () {

        // Admin Mengelola User, Mengubah Role.
        Route::prefix('user-list')->group(function(){
            Route::get('/index', [UserManagementController::class, 'index'])->name('roles.index');
            Route::put('/role-management/{user}', [UserManagementController::class, 'update'])->name('roles.update');
        });


        Route::get('/gdrive', [FileUploadController::class, 'adminIndex'])->name('admin.gdrive.index');

    });

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

