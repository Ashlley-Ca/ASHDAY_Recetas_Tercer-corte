<?php

namespace App\Models;

// Importa la clase base Model de Laravel
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    /**
     * $fillable: Indica qué campos pueden ser llenados masivamente
     * cuando usamos: - Categoria::create() - Categoria::update()
     *
     * Esto protege la aplicación y evita que se inserten campos no permitidos.
     */
    protected $fillable = [

        'nombre',       // Nombre de la categoría
        'descripcion',   // Descripción de la categoría
        'imagen',        // Imagen de la categoria
        'icono',         // Icono de la categoria 
        'color'         // Color de la categoria
    ];
}