<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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
        ->name('berita.data');
    Route::resource('berita', \App\Http\Controllers\Admin\BeritaController::class);

    //Peraturan
    Route::get('/peraturan/data', [\App\Http\Controllers\Admin\PeraturanController::class, 'anyData'])
        ->name('peraturan.data');
    Route::get('/peraturan/file/{slug}', [\App\Http\Controllers\Admin\PeraturanController::class, 'file'])
        ->name('peraturan.file');
    Route::resource('peraturan', \App\Http\Controllers\Admin\PeraturanController::class);

    //Intervensi
    Route::get('/intervensi/file/{id}', [\App\Http\Controllers\Admin\IntervensiController::class, 'file'])
        ->name('intervensi.file');
    Route::resource('intervensi', \App\Http\Controllers\Admin\IntervensiController::class);
});
