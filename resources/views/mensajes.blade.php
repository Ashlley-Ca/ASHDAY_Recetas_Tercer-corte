@extends('layouts.app')

@section('title', 'Mensajes')

@section('content')
<h2 class="text-center mb-4">Mensajes recibidos</h2>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Tipo</th>
            <th>Mensaje</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mensajes as $men)
            <tr>
                <td>{{$men->id}}</td>
                <td>{{$men->nombres}}</td>
                <td>{{$men->apellidos}}</td>
                <td>{{$men->correo}}</td>
                <td>{{$men->tipo}}</td>
                <td>{{$men->mensaje}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection