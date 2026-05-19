{{-- Extiende el layout principal de la aplicación (layouts/app.blade.php) --}}
@extends('layouts.app')

{{-- Define el título de la pestaña del navegador --}}
@section('title', 'Dashboard')

{{-- ============================================================
     CONTENIDO PRINCIPAL
     Se inyecta en el @yield('content') del layout base
============================================================ --}}
@section('content')

    {{-- Fila centrada que limita el ancho del contenido a 8 columnas --}}
    <div class="row justify-content-center">

        <div class="col-lg-8">

            {{-- Card principal con padding generoso y contenido centrado --}}
            <div class="card p-5 text-center">

                {{-- ============================================================
                     ENCABEZADO DEL DASHBOARD
                     Saludo de bienvenida y descripción del panel
                ============================================================ --}}
                <div class="mb-4">

                    <h1 class="display-5 fw-bold">
                        👨‍🍳 Bienvenido al Dashboard
                    </h1>

                    {{-- Descripción breve de las funciones disponibles en el panel --}}
                    <p class="mt-3 text-muted">
                        Desde aquí podrás administrar los mensajes PQRS
                        y gestionar el contenido de ASHDAY Recetas.
                    </p>

                </div>

                {{-- ============================================================
                     BOTONES DE ACCESO RÁPIDO
                     d-flex + gap-3 + flex-wrap: fila de botones con separación
                     que se apilan automáticamente en pantallas pequeñas
                ============================================================ --}}
                <div class="d-flex justify-content-center gap-3 flex-wrap">

                    {{-- Acceso directo a la bandeja de mensajes PQRS --}}
                    <a href="{{ route('mensajes') }}" class="btn btn-receta">
                        📩 Ver mensajes PQRS
                    </a>

                    {{-- Acceso directo al listado de recetas publicadas --}}
                    <a href="{{ route('recetas') }}" class="btn btn-receta">
                        🍽️ Ver recetas
                    </a>

                    {{-- Acceso directo al formulario de creación de recetas --}}
                    <a href="{{ route('recetas.crear') }}" class="btn btn-receta">
                        ➕ Crear receta
                    </a>

                </div>

            </div>

        </div>

    </div>

@endsection