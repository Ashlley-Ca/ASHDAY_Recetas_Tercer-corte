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
        // Crea la tabla 'pqrs' en la base de datos
        Schema::create('pqrs', function (Blueprint $table) {

            $table->id();                      // Columna 'id' autoincremental (clave primaria)
            $table->string('nombres');         // Columna para el nombre del solicitante (VARCHAR)
            $table->string('apellidos');       // Columna para los apellidos (VARCHAR)
            $table->string('correo');          // Columna para el correo electrónico (VARCHAR)
            $table->string('tipo');            // Columna para el tipo de PQRS (VARCHAR)
            $table->text('mensaje');           // Columna para el mensaje (TEXT, permite más caracteres que string)
            $table->boolean('terminos')        // Columna booleana para aceptación de términos
                  ->default(false);            // Por defecto en false (no aceptado)
            $table->timestamps();              // Crea columnas 'created_at' y 'updated_at' automáticamente
        });
    }

    /**
     * Método down(): Define qué hacer al revertir la migración
     * Se ejecuta con: php artisan migrate:rollback
     */
    public function down(): void
    {
        // Elimina la tabla 'pqrs' si existe
        Schema::dropIfExists('pqrs');
    }
};
