<?php

/*==========================================================================
| Archivo: routes/web.php
| Descripción: Define todas las rutas HTTP de la aplicación web ASHDAY
|              Recetas. Organizado en tres grupos:
|              1. Rutas públicas (páginas, PQRS y recetas básicas)
|              2. Dashboard protegido por auth
|              3. CRUD de mensajes y recetas protegido por auth
|==========================================================================*/

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PaginaController;
use App\Http\Controllers\PqrsController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\CategoriaController;

/*--------------------------------------------------------------------------
| RUTAS PÚBLICAS
| Accesibles para cualquier visitante sin autenticación.
|--------------------------------------------------------------------------*/

/* Páginas estáticas / informativas
 * Todas gestionadas por PaginaController. */
Route::get('/',          [PaginaController::class, 'inicio'])   ->name('inicio');
Route::get('/menu',      [PaginaController::class, 'menu'])     ->name('menu');
Route::get('/nosotros',  [PaginaController::class, 'nosotros']) ->name('nosotros');
Route::get('/contacto',  [PaginaController::class, 'contacto']) ->name('contacto');
Route::get('/videos',    [PaginaController::class, 'videos'])   ->name('videos');

/*PQRS — Peticiones, Quejas, Reclamos, Sugerencias y Felicitaciones.
 * Solo se expone el método store (POST) porque el formulario es público.
 * La gestión de mensajes recibidos está protegida más abajo.*/
Route::post('/pqrs', [PqrsController::class, 'store'])->name('pqrs.store');

/* Recetas — Rutas de solo lectura y creación pública.
 * CORRECCIÓN: se añaden las rutas show, edit, update y destroy
 * que faltaban y que son referenciadas desde las vistas (recetas.blade.php).
 * Las rutas de escritura (crear, editar, eliminar) se mueven al grupo
 * auth para protegerlas correctamente.
 * 
 *  Método   URI                   Acción    Nombre de ruta
 *  GET      /recetas              index     recetas.index
 *  GET      /recetas/crear        create    recetas.create  ← alias: recetas.crear
 *  POST     /recetas              store     recetas.store
 *  GET      /recetas/{receta}     show      recetas.show
 *  GET      /recetas/{receta}/edit  edit    recetas.edit
 *  PUT      /recetas/{receta}     update    recetas.update
 *  DELETE   /recetas/{receta}     destroy   recetas.destroy*/

// Rutas públicas de solo lectura: listado y detalle
Route::get('/recetas',          [RecetaController::class, 'index']) ->name('recetas.index');
Route::get('/recetas/{receta}', [RecetaController::class, 'show'])  ->name('recetas.show');

// NOTA: el alias 'recetas' (sin sufijo) se mantiene para compatibilidad
// con las vistas existentes que usan route('recetas').
// Se puede quitar cuando todas las vistas usen route('recetas.index').
Route::get('/recetas', [RecetaController::class, 'index'])->name('recetas');

/*--------------------------------------------------------------------------
| DASHBOARD
| Ruta simple protegida por el middleware 'auth'.
| MEJORA: movida al grupo auth de abajo para centralizar la protección.
|--------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------
| RUTAS PROTEGIDAS — Requieren sesión iniciada (middleware 'auth')
|--------------------------------------------------------------------------*/
Route::middleware('auth')->group(function () {

    /*Dashboard principal del usuario autenticado.
     * MEJORA: se incluye aquí en lugar de declararlo suelto arriba,
     * así queda claro que requiere auth junto al resto de rutas privadas. */
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    /* Recetas — Rutas de escritura (crear, editar, eliminar).
     * Solo usuarios autenticados pueden crear o modificar recetas.
     *
     * Se mantiene el alias 'recetas.crear' para compatibilidad con
     * las vistas que usan route('recetas.crear').*/
    Route::get('/recetas/crear',         [RecetaController::class, 'create']) ->name('recetas.crear');
    Route::post('/recetas',              [RecetaController::class, 'store'])  ->name('recetas.store');
    Route::get('/recetas/{receta}/edit', [RecetaController::class, 'edit'])   ->name('recetas.edit');
    Route::put('/recetas/{receta}',      [RecetaController::class, 'update']) ->name('recetas.update');
    Route::delete('/recetas/{receta}',   [RecetaController::class, 'destroy'])->name('recetas.destroy');

    /* Mensajes PQRS — Solo administradores/usuarios autenticados
     * pueden ver, editar o eliminar los mensajes recibidos.
     *  Método   URI                       Acción    Nombre de ruta
     *  GET      /mensajes                 index     mensajes.index
     *  GET      /mensajes/{id}/edit       edit      mensajes.edit
     *  PUT      /mensajes/{id}            update    mensajes.update
     *  DELETE   /mensajes/{id}            destroy   mensajes.destroy
     */
    Route::resource('mensajes', PqrsController::class)
        ->only(['index', 'edit', 'update', 'destroy']);

    /*Categorías — CRUD completo protegido por autenticación.
     *Solo los usuarios que hayan iniciado sesión podrán:
     * - Ver el listado de categorías
     * - Crear nuevas categorías
     * - Editar categorías existentes
     * - Eliminar categorías
     *
     * Route::resource() genera automáticamente las siguientes rutas:
     *
     * GET      /categorias              -> index    -> categorias.index
     * GET      /categorias/create       -> create   -> categorias.create
     * POST     /categorias              -> store    -> categorias.store
     * GET      /categorias/{id}/edit    -> edit     -> categorias.edit
     * PUT      /categorias/{id}         -> update   -> categorias.update
     * DELETE   /categorias/{id}         -> destroy  -> categorias.destroy*/
    Route::resource('categorias', CategoriaController::class);

    /*NOTA: Route::resource() genera los nombres mensajes.index,
     * mensajes.edit, mensajes.update y mensajes.destroy automáticamente,
     * por lo que si las vistas usaban esos nombres ya funcionan sin cambio.
     * Si usaban el alias 'mensajes' (GET) sigue funcionando igual.*/

});

/* RUTAS DE AUTENTICACIÓN (generadas por Breeze / Jetstream / Fortify)
| Incluye: login, register, logout, password reset, etc.*/
require __DIR__ . '/auth.php';