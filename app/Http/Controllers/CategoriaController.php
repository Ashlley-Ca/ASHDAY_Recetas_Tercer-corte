<?php

namespace App\Http\Controllers;

// Importa el modelo Categoria para poder trabajar con la tabla categorias
use App\Models\Categoria;

// Importa la clase Request para capturar y validar los datos del formulario
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Muestra el listado de todas las categorías.
     *
     * URL: GET /categorias
     * Vista: categorias.index
     */
    public function index()
    {
        // Obtiene todas las categorías ordenadas de la más reciente a la más antigua
        $categorias = Categoria::latest()->get();

        // Envía la variable $categorias a la vista
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Muestra el formulario para crear una nueva categoría.
     *
     * URL: GET /categorias/create
     * Vista: categorias.create
     */
    public function create()
    {
        // Retorna la vista con el formulario de creación
        return view('categorias.create');
    }

    /**
     * Guarda una nueva categoría en la base de datos.
     *
     * URL: POST /categorias
     */
    public function store(Request $request)
    {
        // Valida los datos enviados desde el formulario
        $request->validate([
            'nombre' => 'required|min:3|max:100',
            'descripcion' => 'required|min:10',
        ], [
            'nombre.required' => 'El nombre de la categoría es obligatorio.',
            'nombre.min' => 'El nombre debe tener al menos 3 caracteres.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.min' => 'La descripción debe tener al menos 10 caracteres.',
        ]);

        // Crea la categoría usando asignación masiva ($fillable)
        Categoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'icono' => $request->icono,
            'color' => $request->color,
        ]);

        // Redirige al listado con un mensaje de éxito
        return redirect()
            ->route('categorias.index')
            ->with('success', 'Categoría creada correctamente.');
    }

    /**
     * Muestra el formulario para editar una categoría existente.
     *
     * URL: GET /categorias/{categoria}/edit
     */
    public function edit(Categoria $categoria)
    {
        // Envía la categoría seleccionada a la vista
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Actualiza una categoría existente.
     *
     * URL: PUT /categorias/{categoria}
     */
    public function update(Request $request, Categoria $categoria)
    {
        // Valida nuevamente los datos
        $request->validate([
            'nombre' => 'required|min:3|max:100',
            'descripcion' => 'required|min:10',
        ], [
            'nombre.required' => 'El nombre de la categoría es obligatorio.',
            'nombre.min' => 'El nombre debe tener al menos 3 caracteres.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.min' => 'La descripción debe tener al menos 10 caracteres.',
        ]);

        // Actualiza la categoría
        $categoria->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        // Redirige al listado con mensaje de éxito
        return redirect()
            ->route('categorias.index')
            ->with('success', 'Categoría actualizada correctamente.');
    }

    /**
     * Elimina una categoría de la base de datos.
     *
     * URL: DELETE /categorias/{categoria}
     */
    public function destroy(Categoria $categoria)
    {
        // Elimina el registro
        $categoria->delete();

        // Redirige al listado con mensaje de éxito
        return redirect()
            ->route('categorias.index')
            ->with('success', 'Categoría eliminada correctamente.');
            
    }
}