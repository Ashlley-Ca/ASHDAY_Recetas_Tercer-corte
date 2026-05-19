<?php

// Define el espacio de nombres del modelo, ubicado en App\Models
namespace App\Models;

// Importa la clase base Model de Eloquent para heredar sus funcionalidades
use Illuminate\Database\Eloquent\Model;

// Declara la clase Pqrs que extiende (hereda) de Model
// Al heredar, obtiene métodos como find(), create(), save(), delete(), etc.
class Pqrs extends Model
{
    // Indica explícitamente el nombre de la tabla en la base de datos
    protected $table = 'pqrs';

    // Define los campos permitidos para asignación masiva (mass assignment)
    // Solo estos campos podrán llenarse con métodos como create() o fill()
    // Es una medida de seguridad contra ataques de asignación masiva
    protected $fillable = [
        'nombres',    // Nombre(s) del solicitante
        'apellidos',  // Apellido(s) del solicitante
        'correo',     // Correo electrónico de contacto
        'tipo',       // Tipo de PQRS (Petición, Queja, Reclamo, Sugerencia)
        'mensaje',    // Contenido del mensaje o solicitud
        'acepto',     // Indica si el usuario aceptó términos y condiciones
    ];
}

