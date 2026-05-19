<?php

// Define el espacio de nombres del modelo, ubicado en App\Models
namespace App\Models;

// Importa la clase base Model de Eloquent para heredar sus funcionalidades
use Illuminate\Database\Eloquent\Model;

// Declara la clase Receta que extiende (hereda) de Model
// Al heredar, obtiene métodos como find(), create(), save(), delete(), etc.
class Receta extends Model
{
    // Define los campos permitidos para asignación masiva (mass assignment)
    // Solo estos campos podrán llenarse con métodos como create() o fill()
    // Es una medida de seguridad contra ataques de asignación masiva
    protected $fillable = [
        'nombre',       // Nombre de la receta
        'autor',        // Autor o creador de la receta
        'categoria',    // Categoría de la receta (ej: desayuno, almuerzo, cena)
        'ingredientes', // Lista de ingredientes necesarios para la receta
        'preparacion',  // Pasos o instrucciones para preparar la receta
        'tiempo',       // Tiempo estimado de preparación
        'imagen',       // Ruta o URL de la imagen representativa de la receta
        'dificultad'    // Nivel de dificultad (ej: fácil, medio, difícil)
    ];
}
