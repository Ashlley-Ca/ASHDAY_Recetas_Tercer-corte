<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receta;

class RecetaController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    | Muestra todas las recetas registradas.
    */

    public function index()
    {
        $recetas = Receta::all();

        return view('recetas', compact('recetas'));
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    | Muestra el formulario para crear recetas.
    */

    public function create()
    {
        return view('crear_receta');
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    | Guarda una nueva receta en la base de datos.
    */

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

        /*
        |--------------------------------------------------------------------------
        | GUARDAR IMAGEN
        |--------------------------------------------------------------------------
        */

        $rutaImagen = null;

        if ($request->hasFile('imagen')) {

            $rutaImagen = $request
                ->file('imagen')
                ->store('recetas', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | CREAR RECETA
        |--------------------------------------------------------------------------
        */

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

        return redirect()
            ->route('recetas')
            ->with('success', 'Receta guardada correctamente');
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    | Muestra una receta específica.
    */

    public function show(Receta $receta)
    {
        return view('show_receta', compact('receta'));
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    | Muestra el formulario para editar una receta.
    */

    public function edit(Receta $receta)
    {
        return view('editar_receta', compact('receta'));
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    | Actualiza una receta existente.
    */

    public function update(Request $request, Receta $receta)
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

        /*
        |--------------------------------------------------------------------------
        | ACTUALIZAR IMAGEN SI EXISTE
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('imagen')) {

            $rutaImagen = $request
                ->file('imagen')
                ->store('recetas', 'public');

            $receta->imagen = $rutaImagen;
        }

        /*
        |--------------------------------------------------------------------------
        | ACTUALIZAR DATOS
        |--------------------------------------------------------------------------
        */

        $receta->update([

            'nombre' => $request->nombre,
            'autor' => $request->autor,
            'categoria' => $request->categoria,
            'ingredientes' => $request->ingredientes,
            'preparacion' => $request->preparacion,
            'tiempo' => $request->tiempo,
            'dificultad' => $request->dificultad,
            'imagen' => $receta->imagen

        ]);

        return redirect()
            ->route('recetas')
            ->with('success', 'Receta actualizada correctamente');
    }

    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    | Elimina una receta.
    */

    public function destroy(Receta $receta)
    {
        $receta->delete();

        return redirect()
            ->route('recetas')
            ->with('success', 'Receta eliminada correctamente');
    }
}