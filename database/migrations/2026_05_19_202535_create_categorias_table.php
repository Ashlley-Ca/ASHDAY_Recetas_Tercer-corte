<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta la migración y crea la tabla categorias.
     */
    public function up(): void
    {
        Schema::create('categorias', function (Blueprint $table) {

            $table->id(); // Crea la llave primaria autoincremental

            $table->string('nombre');
            // Guarda el nombre de la categoría
            // Ejemplo: Desayunos, Postres, Jugos y Bebidas

            $table->text('descripcion');
            // Guarda una descripción más detallada

            $table->timestamps();
            // Crea automáticamente las columnas:
            // created_at y updated_at
        });
    }

    /**
     * Elimina la tabla categorias si se revierte la migración.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};