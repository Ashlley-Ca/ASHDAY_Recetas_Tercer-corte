<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 public function up(): void
{
    Schema::create('pqrs', function (Blueprint $table) {
        $table->id();
        $table->string('nombres');
        $table->string('apellidos');
        $table->string('correo');
        $table->string('tipo');
        $table->text('mensaje');
        $table->boolean('terminos')->default(false);
        $table->timestamps();
    });
}
    public function down(): void
    {
        Schema::dropIfExists('pqrs');
    }
};
