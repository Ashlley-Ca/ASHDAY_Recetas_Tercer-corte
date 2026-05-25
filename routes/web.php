<?php

/*==========================================================================
| Archivo: routes/web.php
| Proyecto: ASHDAY Recetas
| Descripción:
| Archivo principal de rutas web de la aplicación.
|--------------------------------------------------------------------------
*/

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PaginaController;
use App\Http\Controllers\PqrsController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\CategoriaController;

/*==========================================================================
| RUTAS PÚBLICAS
|--------------------------------------------------------------------------
| Accesibles sin iniciar sesión.
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| PÁGINAS PRINCIPALES
|--------------------------------------------------------------------------
*/

Route::get('/', [PaginaController::class, 'inicio'])
    ->name('inicio');

Route::get('/menu', [PaginaController::class, 'menu'])
    ->name('menu');

Route::get('/nosotros', [PaginaController::class, 'nosotros'])
    ->name('nosotros');

Route::get('/contacto', [PaginaController::class, 'contacto'])
    ->name('contacto');

Route::get('/videos', [PaginaController::class, 'videos'])
    ->name('videos');

/*
|--------------------------------------------------------------------------
| PQRS
|--------------------------------------------------------------------------
*/

Route::post('/pqrs', [PqrsController::class, 'store'])
    ->name('pqrs.store');

/*
|--------------------------------------------------------------------------
| RECETAS — PÚBLICAS
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| LISTAR RECETAS
|--------------------------------------------------------------------------
*/

Route::get('/recetas', [RecetaController::class, 'index'])
    ->name('recetas');

/*
|--------------------------------------------------------------------------
| CREAR RECETA
|--------------------------------------------------------------------------
| IMPORTANTE:
| Esta ruta DEBE ir antes de /recetas/{receta}
|--------------------------------------------------------------------------
*/

Route::get('/recetas/crear', [RecetaController::class, 'create'])
    ->middleware('auth')
    ->name('recetas.crear');

/*
|--------------------------------------------------------------------------
| GUARDAR RECETA
|--------------------------------------------------------------------------
*/

Route::post('/recetas', [RecetaController::class, 'store'])
    ->middleware('auth')
    ->name('recetas.store');

/*
|--------------------------------------------------------------------------
| MOSTRAR RECETA
|--------------------------------------------------------------------------
| whereNumber():
| Evita que Laravel interprete textos como "crear"
| como si fueran IDs.
|--------------------------------------------------------------------------
*/

Route::get('/recetas/{receta}', [RecetaController::class, 'show'])
    ->whereNumber('receta')
    ->name('recetas.show');

/*==========================================================================
| RUTAS PROTEGIDAS
|--------------------------------------------------------------------------
| Requieren autenticación.
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | EDITAR RECETA
    |--------------------------------------------------------------------------
    */

    Route::get('/recetas/{receta}/edit', [RecetaController::class, 'edit'])
        ->whereNumber('receta')
        ->name('recetas.edit');

    /*
    |--------------------------------------------------------------------------
    | ACTUALIZAR RECETA
    |--------------------------------------------------------------------------
    */

    Route::put('/recetas/{receta}', [RecetaController::class, 'update'])
        ->whereNumber('receta')
        ->name('recetas.update');

    /*
    |--------------------------------------------------------------------------
    | ELIMINAR RECETA
    |--------------------------------------------------------------------------
    */

    Route::delete('/recetas/{receta}', [RecetaController::class, 'destroy'])
        ->whereNumber('receta')
        ->name('recetas.destroy');

    /*
    |--------------------------------------------------------------------------
    | MENSAJES PQRS
    |--------------------------------------------------------------------------
    */

    Route::resource('mensajes', PqrsController::class)
        ->only([
            'index',
            'edit',
            'update',
            'destroy'
        ]);

    /*
    |--------------------------------------------------------------------------
    | CATEGORÍAS
    |--------------------------------------------------------------------------
    */

    Route::resource('categorias', CategoriaController::class);

});

/*==========================================================================
| AUTENTICACIÓN
|--------------------------------------------------------------------------
| Login, registro, recuperación de contraseña, etc.
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';