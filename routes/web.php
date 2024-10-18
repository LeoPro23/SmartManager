<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ProfileController;

/*
Route::get('/welcome', function () {
    return view('welcome');
});
*/

// Ruta raíz de tu aplicación
Route::get('/', [ArticuloController::class, 'inicio'])->name('inicio');

// Rutas de artículos
Route::get('/articulos', [ArticuloController::class, 'index'])->name('articulos.index');
Route::get('/articulos/{id}', [ArticuloController::class, 'show'])->name('articulos.show');
Route::get('/search', [ArticuloController::class, 'search'])->name('articulos.search');

// Rutas estáticas
Route::get('/nosotros', function () {
    return view('nosotros');
})->name('nosotros');

Route::get('/privacidad', function () {
    return view('privacidad');
})->name('privacidad');

// Ruta de noticias
Route::get('/noticias', [ArticuloController::class, 'noticias'])->name('noticias');

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas de perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

// Incluir las rutas de autenticación
require __DIR__.'/auth.php';
