<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $fillable = [
    'nombre',
    'autor',
    'categoria',
    'ingredientes',
    'preparacion',
    'tiempo',
    'imagen',
    'dificultad'
];
}
