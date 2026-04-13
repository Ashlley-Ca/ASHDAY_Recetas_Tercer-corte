<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\PqrsController;

// Páginas
Route::get('/', [PaginaController::class, 'inicio'])->name('inicio');
Route::get('/contacto', [PaginaController::class, 'contacto'])->name('contacto'); 
Route::get('/menu', [PaginaController::class, 'menu'])->name('menu');
Route::get('/nosotros', [PaginaController::class, 'nosotros'])->name('nosotros');
Route::get('/videos', [PaginaController::class, 'videos'])->name('videos');

// Mensajes
Route::get('/mensajes', [PqrsController::class, 'index'])->name('mensajes');

// PQRS
Route::post('/pqrs', [PqrsController::class, 'store'])->name('pqrs.store');

use App\Http\Controllers\RecetaController;

Route::get('/recetas', [RecetaController::class, 'index'])->name('recetas');
Route::get('/recetas/crear', [RecetaController::class, 'create'])->name('recetas.crear');
Route::post('/recetas', [RecetaController::class, 'store'])->name('recetas.store');