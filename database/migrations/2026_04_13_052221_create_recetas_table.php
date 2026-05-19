<?php

// Importa la clase base Migration para definir migraciones de base de datos
use Illuminate\Database\Migrations\Migration;

// Importa Blueprint, que permite definir la estructura (columnas) de la tabla
use Illuminate\Database\Schema\Blueprint;

// Importa el facade Schema, que proporciona métodos para crear/modificar tablas
use Illuminate\Support\Facades\Schema;

// Retorna una clase anónima que extiende Migration
// Laravel la detecta y ejecuta automáticamente con "php artisan migrate"
return new class extends Migration
{
    /**
     * Método up(): Define qué hacer al ejecutar la migración
     * Se ejecuta con: php artisan migrate
     */
    public function up(): void
    {
        // Crea la tabla 'recetas' en la base de datos
        Schema::create('recetas', function (Blueprint $table) {

            $table->id();                          // Columna 'id' autoincremental (clave primaria)
            $table->string('nombre');              // Nombre de la receta (VARCHAR)
            $table->string('autor');               // Autor o creador de la receta (VARCHAR)
            $table->string('categoria');           // Categoría de la receta (VARCHAR) ej: entrada, postre
            $table->text('ingredientes');          // Lista de ingredientes (TEXT, permite textos largos)
            $table->text('preparacion');           // Pasos de preparación (TEXT, permite textos largos)
            $table->integer('tiempo');             // Tiempo de preparación en minutos (INT)
            $table->string('dificultad');          // Nivel de dificultad: fácil, medio, difícil (VARCHAR)

            // Columna para la imagen de la receta
            // nullable() permite que el campo sea opcional (puede quedar en NULL)
            // es decir, una receta puede guardarse sin imagen
            $table->string('imagen')->nullable();

            $table->timestamps();                  // Crea columnas 'created_at' y 'updated_at' automáticamente
        });
    }

    /**
     * Método down(): Define qué hacer al revertir la migración
     * Se ejecuta con: php artisan migrate:rollback
     */
    public function down(): void
    {
        // Elimina la tabla 'recetas' si existe
        Schema::dropIfExists('recetas');
    }
};