@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-8">

        <div class="card p-5 text-center">

            <div class="mb-4">
                <h1 class="display-5 fw-bold">
                    👨‍🍳 Bienvenido al Dashboard
                </h1>

                <p class="mt-3 text-muted">
                    Desde aquí podrás administrar los mensajes PQRS
                    y gestionar el contenido de ASHDAY Recetas.
                </p>
            </div>

            <div class="d-flex justify-content-center gap-3 flex-wrap">

                <a href="{{ route('mensajes') }}" class="btn btn-receta">
                    📩 Ver mensajes PQRS
                </a>

                <a href="{{ route('recetas') }}" class="btn btn-receta">
                    🍽️ Ver recetas
                </a>

                <a href="{{ route('recetas.crear') }}" class="btn btn-receta">
                    ➕ Crear receta
                </a>

            </div>

        </div>

    </div>

</div>

@endsection