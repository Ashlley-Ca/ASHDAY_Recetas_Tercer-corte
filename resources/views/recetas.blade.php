@extends('layouts.app')

@section('content')

<h2 class="text-center mb-4">🍽️ Recetas de la Comunidad</h2>
<a href="{{ route('recetas.crear') }}" class="btn btn-primary mb-3">
    ➕ Agregar Receta
</a>

@if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif

<div class="row">

@foreach($recetas as $receta)
    <div class="col-md-4 mb-4">
        <div class="card shadow-lg h-100">

            @if($receta->imagen)
                <img src="{{ asset('storage/'.$receta->imagen) }}" class="card-img-top" style="height:200px; object-fit:cover;">
            @endif

            <div class="card-body">
                <h5 class="card-title">{{ $receta->nombre }}</h5>
                <p><strong>👨‍🍳 Autor:</strong> {{ $receta->autor }}</p>
                <p><strong>📂 Categoría:</strong> {{ $receta->categoria }}</p>
                <p><strong>⏱ Tiempo:</strong> {{ $receta->tiempo }} min</p>
                <p><strong>📊 Dificultad:</strong> {{ $receta->dificultad }}</p>
            </div>

        </div>
    </div>
@endforeach

</div>

@endsection