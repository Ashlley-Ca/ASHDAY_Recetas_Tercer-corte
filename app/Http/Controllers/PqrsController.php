<?php

namespace App\Http\Controllers;

use App\Models\Pqrs;
use Illuminate\Http\Request;

class PqrsController extends Controller
{
    // GUARDAR
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'correo' => 'required|email',
            'tipo' => 'required|in:Petición,Queja,Reclamo,Sugerencia,Felicitación',
            'mensaje' => 'required|string',
            'terminos' => 'accepted'
        ]);

        Pqrs::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'correo' => $request->correo,
            'tipo' => $request->tipo,
            'mensaje' => $request->mensaje,
            'terminos' => $request->has('terminos') ? true : false,
        ]);

        return redirect()->route('nosotros')->with('success', 'Mensaje enviado correctamente');
    }

    // MOSTRAR
    public function index()
    {
        $mensajes = Pqrs::orderBy('id','desc')->get();
        return view('mensajes', compact('mensajes'));
    }

    public function edit($id){
        $mensaje = Pqrs ::findORFail($id);
        return view('editar_mensaje', compact('mensaje'));
    } 
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'correo' => 'required|email',
            'tipo' => 'required|in:Petición,Queja,Reclamo,Sugerencia,Felicitación',
            'mensaje' => 'required|string',
            'terminos' => 'accepted'
        ]);

        $mensaje=Pqrs::findOrFail($id);
        $mensaje->update([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'correo' => $request->correo,
            'tipo' => $request->tipo,
            'mensaje' => $request->mensaje,
            'terminos' => $request->has('terminos') ? true : false,
        ]);

        return redirect()->route('mensajes')->with('success', 'Actualizado coreectamente');
    }
}