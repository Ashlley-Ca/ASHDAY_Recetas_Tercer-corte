<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receta;

class RecetaController extends Controller
{
    public function index()
    {
        $recetas = Receta::all();
        return view('recetas', compact('recetas'));
    }

    public function create()
    {
        return view('crear_receta');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'autor' => 'required',
            'categoria' => 'required',
            'ingredientes' => 'required',
            'preparacion' => 'required',
            'tiempo' => 'required|numeric',
            'dificultad' => 'required',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Guardar imagen
        $rutaImagen = null;

        if ($request->hasFile('imagen')) {
            $rutaImagen = $request->file('imagen')->store('recetas', 'public');
        }

        Receta::create([
            'nombre' => $request->nombre,
            'autor' => $request->autor,
            'categoria' => $request->categoria,
            'ingredientes' => $request->ingredientes,
            'preparacion' => $request->preparacion,
            'tiempo' => $request->tiempo,
            'dificultad' => $request->dificultad,
            'imagen' => $rutaImagen
        ]);

        return redirect()->route('recetas')->with('success', 'Receta guardada');
    }
}