<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| Route Admin
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {
    //Berita
    Route::get('/berita/data', [\App\Http\Controllers\Admin\BeritaController::class, 'anyData'])
        ->name('berita.data')->middleware('auth');
    Route::get('/berita/file/{slug}', [\App\Http\Controllers\Admin\BeritaController::class, 'file'])
        ->name('berita.file');
    Route::resource('berita', \App\Http\Controllers\Admin\BeritaController::class)->middleware('auth');

    //Peraturan
    Route::get('/peraturan/data', [\App\Http\Controllers\Admin\PeraturanController::class, 'anyData'])
        ->name('peraturan.data')->middleware('auth');
    Route::get('/peraturan/file/{slug}', [\App\Http\Controllers\Admin\PeraturanController::class, 'file'])
        ->name('peraturan.file');
    Route::resource('peraturan', \App\Http\Controllers\Admin\PeraturanController::class)->middleware('auth');

    //Intervensi
    Route::get('/intervensi/file/{id}', [\App\Http\Controllers\Admin\IntervensiController::class, 'file'])
        ->name('intervensi.file');
    Route::resource('intervensi', \App\Http\Controllers\Admin\IntervensiController::class)->middleware('auth');

    //Kemiskinan
    Route::get('/kemiskinan/file/{id}', [\App\Http\Controllers\Admin\KemiskinanController::class, 'file'])
        ->name('kemiskinan.file');
    Route::get('/kemiskinan/data', [\App\Http\Controllers\Admin\KemiskinanController::class, 'anyData'])
        ->name('kemiskinan.data')->middleware('auth');
    Route::resource('kemiskinan', \App\Http\Controllers\Admin\KemiskinanController::class)->middleware('auth');
});

Route::get('/legalitas', [\App\Http\Controllers\Guest\WebsiteController::class, 'legalitas'])
    ->name('legalitas.index');
