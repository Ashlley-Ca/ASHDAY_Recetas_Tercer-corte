{{-- Extiende el layout principal de la aplicación (layouts/app.blade.php) --}}
@extends('layouts.app')

{{-- Define el título de la pestaña del navegador --}}
@section('title', 'Agregar Receta')

{{-- ============================================================
     CONTENIDO PRINCIPAL
     Se inyecta en el @yield('content') del layout base
============================================================ --}}
@section('content')

<div class="container py-5">

    {{-- ============================================================
         ENCABEZADO DE LA PÁGINA
         Badge decorativo + título principal + descripción
    ============================================================ --}}
    <div class="text-center mb-5">

        {{-- Badge decorativo con gradiente --}}
        <span class="badge titulo-badge px-4 py-2 rounded-pill mb-3">
            ✨ Nueva Receta
        </span>

        {{-- Título principal con gradiente de texto --}}
        <h1 class="display-4 fw-bold titulo-principal">
            🍽️ Comparte tu receta favorita
        </h1>

        {{-- Descripción introductoria --}}
        <p class="texto-secundario mt-3">
            Publica recetas deliciosas, creativas y sorprende
            a toda la comunidad de <strong>ASHDAY Recetas</strong>.
        </p>

    </div>

    {{-- ============================================================
         BLOQUE DE ERRORES DE VALIDACIÓN
         Solo se muestra si el formulario tiene errores al enviarse
         $errors: variable global de Laravel con los errores del request
    ============================================================ --}}
    @if ($errors->any())
        <div class="alert alert-danger border-0 shadow-lg rounded-4 mb-4">

            <h5 class="fw-bold mb-3">
                ⚠️ Hay algunos errores en el formulario
            </h5>

            <ul class="mb-0">
                {{-- Itera sobre todos los mensajes de error y los lista --}}
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    @endif

    {{-- Fila centrada que contiene la card del formulario --}}
    <div class="row justify-content-center">
        <div class="col-lg-10">

            {{-- Card principal con efecto glassmorphism --}}
            <div class="card formulario-card border-0 overflow-hidden">

                {{-- ============================================================
                     HEADER DE LA CARD
                     Fondo con gradiente y título del formulario
                ============================================================ --}}
                <div class="card-header formulario-header text-center py-4 border-0">
                    <h2 class="fw-bold mb-2">👨‍🍳 Información de la receta</h2>
                    <p class="mb-0 opacity-75">
                        Completa todos los campos para compartir tu creación culinaria.
                    </p>
                </div>

                {{-- ============================================================
                     CUERPO DEL FORMULARIO
                     action: ruta donde se envían los datos (RecetaController@store)
                     method POST: envío seguro de datos
                     enctype multipart/form-data: necesario para subir archivos (imagen)
                ============================================================ --}}
                <div class="card-body p-5">

                    <form action="{{ route('recetas.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        {{-- Token CSRF: protege el formulario contra ataques de falsificación --}}
                        @csrf

                        {{-- ================================================
                             FILA 1: Nombre de la receta y Autor
                             Dos columnas iguales en pantallas medianas (col-md-6)
                        ================================================ --}}
                        <div class="row">

                            {{-- Campo: Nombre de la receta --}}
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-semibold">
                                    🍴 Nombre de la receta
                                </label>
                                <input type="text"
                                       name="nombre"
                                       class="form-control custom-input"
                                       placeholder="Ej: Hamburguesa Gourmet"
                                       value="{{ old('nombre') }}"
                                       required>
                                {{-- old('nombre'): repopula el campo si el formulario falla la validación --}}
                            </div>

                            {{-- Campo: Autor de la receta --}}
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-semibold">
                                    👨‍🍳 Autor
                                </label>
                                <input type="text"
                                       name="autor"
                                       class="form-control custom-input"
                                       placeholder="Tu nombre"
                                       value="{{ old('autor') }}"
                                       required>
                            </div>

                        </div>

                        {{-- ================================================
                             FILA 2: Categoría y Tiempo de preparación
                        ================================================ --}}
                        <div class="row">

                            {{-- Campo: Categoría (select con opciones fijas) --}}
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-semibold">
                                    📂 Categoría
                                </label>
                                <select name="categoria"
                                        class="form-select custom-input"
                                        required>
                                    <option value="">Seleccione una categoría</option>
                                    <option value="Desayuno"  {{ old('categoria') == 'Desayuno'  ? 'selected' : '' }}>🥐 Desayuno</option>
                                    <option value="Almuerzo"  {{ old('categoria') == 'Almuerzo'  ? 'selected' : '' }}>🍛 Almuerzo</option>
                                    <option value="Cena"      {{ old('categoria') == 'Cena'      ? 'selected' : '' }}>🍲 Cena</option>
                                    <option value="Postre"    {{ old('categoria') == 'Postre'    ? 'selected' : '' }}>🍰 Postre</option>
                                </select>
                                {{-- old('categoria'): mantiene la opción seleccionada si hay error de validación --}}
                            </div>

                            {{-- Campo: Tiempo de preparación en minutos (solo números) --}}
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-semibold">
                                    ⏱ Tiempo de preparación (minutos)
                                </label>
                                <input type="number"
                                       name="tiempo"
                                       class="form-control custom-input"
                                       placeholder="Ej: 30"
                                       value="{{ old('tiempo') }}"
                                       min="1"
                                       required>
                                {{-- min="1": evita que se ingresen valores negativos o cero --}}
                            </div>

                        </div>

                        {{-- ================================================
                             Campo: Nivel de dificultad (select)
                        ================================================ --}}
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                🔥 Nivel de dificultad
                            </label>
                            <select name="dificultad"
                                    class="form-select custom-input"
                                    required>
                                <option value="">Seleccione dificultad</option>
                                <option value="Fácil"   {{ old('dificultad') == 'Fácil'   ? 'selected' : '' }}>🟢 Fácil</option>
                                <option value="Media"   {{ old('dificultad') == 'Media'   ? 'selected' : '' }}>🟡 Media</option>
                                <option value="Difícil" {{ old('dificultad') == 'Difícil' ? 'selected' : '' }}>🔴 Difícil</option>
                            </select>
                        </div>

                        {{-- ================================================
                             Campo: Ingredientes (área de texto)
                             rows="5": altura inicial del textarea
                        ================================================ --}}
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                🧂 Ingredientes
                            </label>
                            <textarea name="ingredientes"
                                      class="form-control custom-input"
                                      rows="5"
                                      placeholder="Escribe los ingredientes..."
                                      required>{{ old('ingredientes') }}</textarea>
                        </div>

                        {{-- ================================================
                             Campo: Preparación paso a paso (área de texto)
                             rows="6": más alto que ingredientes por su contenido extenso
                        ================================================ --}}
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                👩‍🍳 Preparación
                            </label>
                            <textarea name="preparacion"
                                      class="form-control custom-input"
                                      rows="6"
                                      placeholder="Describe paso a paso la preparación..."
                                      required>{{ old('preparacion') }}</textarea>
                        </div>

                        {{-- ================================================
                             Campo: Imagen de la receta (archivo)
                             accept="image/*": solo permite seleccionar imágenes
                             No tiene 'required' porque en la migración es nullable()
                        ================================================ --}}
                        <div class="mb-5">
                            <label class="form-label fw-semibold">
                                📸 Imagen de la receta
                            </label>
                            <input type="file"
                                   name="imagen"
                                   class="form-control custom-file"
                                   accept="image/*">
                            <small class="texto-ayuda">
                                Agrega una imagen atractiva de tu receta. (Opcional)
                            </small>
                        </div>

                        {{-- ================================================
                             BOTONES DE ACCIÓN
                             d-flex + gap-3: alinea los botones con separación
                             flex-wrap: en móvil se apilan si no caben
                        ================================================ --}}
                        <div class="d-flex flex-wrap gap-3 justify-content-center">

                            {{-- Botón de envío del formulario --}}
                            <button type="submit" class="btn btn-guardar px-5 py-3">
                                🚀 Guardar Receta
                            </button>

                            {{-- Botón para cancelar y volver al listado de recetas --}}
                            <a href="{{ route('recetas') }}" class="btn btn-cancelar px-5 py-3">
                                ↩️ Volver
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

</div>

{{-- ============================================================
     ESTILOS ESPECÍFICOS DE ESTA VISTA
     Se definen aquí para no afectar el resto de la aplicación
============================================================ --}}
<style>

    /* Badge del encabezado con gradiente morado-rosado */
    .titulo-badge {
        background: linear-gradient(135deg, #8b5cf6, #ec4899);
        color: white;
        font-size: .9rem;
        letter-spacing: 1px;
        box-shadow: 0 0 20px rgba(236, 72, 153, .4);
    }

    /* Título principal con gradiente de texto blanco a morado y rosado */
    .titulo-principal {
        background: linear-gradient(90deg, #ffffff, #c084fc, #f472b6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Texto descriptivo suave centrado */
    .texto-secundario {
        color: #cbd5e1;
        font-size: 1.1rem;
        max-width: 700px;
        margin: auto;
    }

    /* Card principal con efecto glassmorphism */
    .formulario-card {
        background: rgba(255, 255, 255, .08);
        backdrop-filter: blur(18px);
        border: 1px solid rgba(255, 255, 255, .08);
        box-shadow:
            0 0 30px rgba(139, 92, 246, .18),
            0 0 50px rgba(236, 72, 153, .08);
    }

    /* Header de la card con gradiente de fondo */
    .formulario-header {
        background: linear-gradient(
            135deg,
            rgba(139, 92, 246, .35),
            rgba(236, 72, 153, .25),
            rgba(6, 182, 212, .2)
        );
        color: white;
    }

    /* Inputs, textareas y selects con fondo translúcido */
    .custom-input {
        background: rgba(255, 255, 255, .08) !important;
        border: 1px solid rgba(255, 255, 255, .08) !important;
        border-radius: 18px !important;
        padding: 15px !important;
        color: white !important;
        transition: .3s;
    }

    /* Al enfocar: resalta con color morado y leve escala */
    .custom-input:focus {
        border-color: #c084fc !important;
        box-shadow: 0 0 15px rgba(192, 132, 252, .35) !important;
        transform: scale(1.01);
    }

    .custom-input::placeholder { color: #cbd5e1; }

    .form-label {
        color: #f8fafc;
        margin-bottom: 10px;
    }

    /* Evita que el usuario redimensione los textareas manualmente */
    textarea { resize: none; }

    /* Input de archivo con mismo estilo que los demás campos */
    .custom-file {
        background: rgba(255, 255, 255, .08) !important;
        border: 1px solid rgba(255, 255, 255, .08) !important;
        border-radius: 18px !important;
        padding: 14px !important;
        color: white !important;
    }

    /* Texto de ayuda debajo del input de imagen */
    .texto-ayuda {
        display: block;
        margin-top: 8px;
        color: #cbd5e1;
    }

    /* Botón principal de guardar con gradiente y efecto hover */
    .btn-guardar {
        border: none;
        border-radius: 50px;
        font-weight: 600;
        color: white;
        background: linear-gradient(135deg, #8b5cf6, #ec4899);
        box-shadow: 0 0 25px rgba(236, 72, 153, .35);
        transition: .3s;
    }

    .btn-guardar:hover {
        transform: translateY(-4px) scale(1.04);
        box-shadow:
            0 0 30px rgba(236, 72, 153, .5),
            0 0 45px rgba(139, 92, 246, .4);
        color: white;
    }

    /* Botón secundario de cancelar con fondo translúcido */
    .btn-cancelar {
        border-radius: 50px;
        font-weight: 600;
        border: 1px solid rgba(255, 255, 255, .15);
        background: rgba(255, 255, 255, .05);
        color: white;
        transition: .3s;
    }

    .btn-cancelar:hover {
        background: rgba(255, 255, 255, .12);
        transform: translateY(-3px);
        color: white;
    }

    /* Alerta de errores de validación con fondo rojo translúcido */
    .alert-danger {
        background: rgba(220, 38, 38, .12);
        color: #fecaca;
        backdrop-filter: blur(12px);
        border: 1px solid rgba(248, 113, 113, .2);
    }

    /* Ajustes responsive para pantallas menores a 768px */
    @media (max-width: 768px) {
        .titulo-principal { font-size: 2.5rem; }
        .card-body { padding: 2rem !important; }
    }

</style>

@endsection