<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PaginaController;
use App\Http\Controllers\PqrsController;
use App\Http\Controllers\RecetaController;

/*
|--------------------------------------------------------------------------
| Rutas públicas
|--------------------------------------------------------------------------
*/

// Páginas
Route::get('/', [PaginaController::class, 'inicio'])->name('inicio');
Route::get('/menu', [PaginaController::class, 'menu'])->name('menu');
Route::get('/nosotros', [PaginaController::class, 'nosotros'])->name('nosotros');
Route::get('/contacto', [PaginaController::class, 'contacto'])->name('contacto');
Route::get('/videos', [PaginaController::class, 'videos'])->name('videos');

// PQRS
Route::post('/pqrs', [PqrsController::class, 'store'])->name('pqrs.store');

// Recetas
Route::get('/recetas', [RecetaController::class, 'index'])->name('recetas');
Route::get('/recetas/crear', [RecetaController::class, 'create'])->name('recetas.crear');
Route::post('/recetas', [RecetaController::class, 'store'])->name('recetas.store');


/*
|--------------------------------------------------------------------------
| Dashboard protegido
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');


/*
|--------------------------------------------------------------------------
| Rutas protegidas con autenticación
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Mensajes
    Route::get('/mensajes', [PqrsController::class, 'index'])->name('mensajes');

    // Editar mensaje
    Route::get('/mensajes/{id}/editar', [PqrsController::class, 'edit'])
        ->name('mensajes.edit');

    // Actualizar mensaje
    Route::put('/mensajes/{id}', [PqrsController::class, 'update'])
        ->name('mensajes.update');

    // Eliminar mensaje
    Route::delete('/mensajes/{id}', [PqrsController::class, 'destroy'])
        ->name('mensajes.destroy');
});

require __DIR__.'/auth.php';