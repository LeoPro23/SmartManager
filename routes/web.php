<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CalculadoraController;
use App\Http\Controllers\RatioController;
use App\Http\Controllers\FinancialController;


Route::get('/ratios', function () {
    return view('ratios.form');
})->middleware('auth')->name('ratios.form');

Route::post('/ratios/calculate', [FinancialController::class, 'calculateAndInterpretRatios'])
    ->middleware('auth')
    ->name('ratios.calculate');


// LEO
Route::middleware('auth')->group(function () {
    Route::get('/calculadorformula', [CalculadoraController::class, 'show'])->name('calculadorformula');
    Route::post('/calcularformula', [CalculadoraController::class, 'calcular'])->name('calcularformula');
});



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
