{{-- Extiende el layout principal de la aplicación (layouts/app.blade.php) --}}
@extends('layouts.app')

{{-- Define el título de la pestaña del navegador --}}
@section('title', 'Editar Mensaje')

{{-- ============================================================
     CONTENIDO PRINCIPAL
     Se inyecta en el @yield('content') del layout base
============================================================ --}}
@section('content')

<div class="container py-5">

    {{-- ============================================================
         ENCABEZADO DE LA PÁGINA
         Badge decorativo + título + descripción
    ============================================================ --}}
    <div class="text-center mb-5">

        {{-- Badge decorativo con gradiente --}}
        <span class="badge rounded-pill px-4 py-2 mb-3 titulo-badge">
            ✨ Gestión de PQRS
        </span>

        {{-- Título principal con gradiente de texto --}}
        <h1 class="display-5 fw-bold titulo-principal">
            ✏️ Editar Mensaje
        </h1>

        {{-- Descripción del propósito de esta vista --}}
        <p class="texto-secundario">
            Actualiza la información del mensaje recibido
            de manera rápida y sencilla.
        </p>

    </div>

    {{-- ============================================================
         BLOQUE DE ERRORES DE VALIDACIÓN
         Solo se muestra si el formulario retorna errores
         $errors: variable global de Laravel con los errores del request
    ============================================================ --}}
    @if($errors->any())
        <div class="alert alert-danger border-0 shadow-lg rounded-4 mb-4">

            <h5 class="fw-bold mb-3">⚠️ Se encontraron algunos errores</h5>

            <ul class="mb-0">
                {{-- Itera y lista todos los mensajes de error de validación --}}
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    @endif

    {{-- Fila centrada que contiene la card del formulario --}}
    <div class="row justify-content-center">
        <div class="col-lg-10">

            {{-- Card principal con efecto glassmorphism --}}
            <div class="card border-0 shadow-lg rounded-5 glass-card overflow-hidden">

                {{-- ============================================================
                     HEADER DE LA CARD
                     Fondo con gradiente y título del formulario
                ============================================================ --}}
                <div class="card-header border-0 text-center py-4 formulario-header">
                    <h2 class="fw-bold mb-2">📝 Información del Mensaje</h2>
                    <p class="mb-0 opacity-75">
                        Modifica los datos necesarios y guarda los cambios.
                    </p>
                </div>

                {{-- ============================================================
                     CUERPO DEL FORMULARIO
                     action: ruta de actualización con el ID del mensaje
                     method POST + @method('PUT'): Laravel requiere POST en HTML,
                     @method('PUT') simula el verbo PUT que espera el controlador
                ============================================================ --}}
                <div class="card-body p-5">

                    <form action="{{ route('mensajes.update', $mensaje->id) }}"
                          method="POST">

                        {{-- Token CSRF: protege el formulario contra ataques de falsificación --}}
                        @csrf

                        {{-- Directiva que simula el método HTTP PUT
                             ya que los formularios HTML solo soportan GET y POST --}}
                        @method('PUT')

                        {{-- ================================================
                             FILA 1: Nombres y Apellidos
                             Dos columnas iguales en pantallas medianas
                        ================================================ --}}
                        <div class="row">

                            {{-- Campo: Nombres del remitente
                                 value: precarga el valor actual del registro --}}
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-semibold">👤 Nombres</label>
                                <input type="text"
                                       name="nombres"
                                       class="form-control form-control-lg custom-input"
                                       value="{{ old('nombres', $mensaje->nombres) }}"
                                       placeholder="Ingresa los nombres"
                                       required>
                                {{-- old('nombres', $mensaje->nombres): si hay error de validación
                                     mantiene el valor editado; si no, muestra el valor de la BD --}}
                            </div>

                            {{-- Campo: Apellidos del remitente --}}
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-semibold">👥 Apellidos</label>
                                <input type="text"
                                       name="apellidos"
                                       class="form-control form-control-lg custom-input"
                                       value="{{ old('apellidos', $mensaje->apellidos) }}"
                                       placeholder="Ingresa los apellidos"
                                       required>
                            </div>

                        </div>

                        {{-- ================================================
                             Campo: Correo electrónico
                             type="email": valida el formato del correo en el navegador
                        ================================================ --}}
                        <div class="mb-4">
                            <label class="form-label fw-semibold">📧 Correo Electrónico</label>
                            <input type="email"
                                   name="correo"
                                   class="form-control form-control-lg custom-input"
                                   value="{{ old('correo', $mensaje->correo) }}"
                                   placeholder="ejemplo@email.com"
                                   required>
                        </div>

                        {{-- ================================================
                             Campo: Tipo de solicitud (select)
                             Compara el valor actual del registro con cada opción
                             para preseleccionar la correcta con 'selected'
                        ================================================ --}}
                        <div class="mb-4">
                            <label class="form-label fw-semibold">📌 Tipo de Solicitud</label>
                            <select name="tipo"
                                    class="form-select form-select-lg custom-input"
                                    required>

                                <option value="Queja"
                                    {{ old('tipo', $mensaje->tipo) == 'Queja' ? 'selected' : '' }}>
                                    😕 Queja
                                </option>

                                <option value="Petición"
                                    {{ old('tipo', $mensaje->tipo) == 'Petición' ? 'selected' : '' }}>
                                    📩 Petición
                                </option>

                                <option value="Reclamo"
                                    {{ old('tipo', $mensaje->tipo) == 'Reclamo' ? 'selected' : '' }}>
                                    ⚠️ Reclamo
                                </option>

                                <option value="Sugerencia"
                                    {{ old('tipo', $mensaje->tipo) == 'Sugerencia' ? 'selected' : '' }}>
                                    💡 Sugerencia
                                </option>

                                <option value="Felicitación"
                                    {{ old('tipo', $mensaje->tipo) == 'Felicitación' ? 'selected' : '' }}>
                                    🎉 Felicitación
                                </option>

                            </select>
                        </div>

                        {{-- ================================================
                             Campo: Contenido del mensaje (textarea)
                             rows="6": altura inicial del área de texto
                             resize:none en CSS evita que el usuario lo redimensione
                        ================================================ --}}
                        <div class="mb-4">
                            <label class="form-label fw-semibold">💬 Mensaje</label>
                            <textarea name="mensaje"
                                      class="form-control custom-input"
                                      rows="6"
                                      placeholder="Escribe el mensaje aquí..."
                                      required>{{ old('mensaje', $mensaje->mensaje) }}</textarea>
                        </div>

                        {{-- ================================================
                             Campo: Checkbox de aceptación de términos
                             $mensaje->acepto: si es true en BD, el checkbox aparece marcado
                        ================================================ --}}
                        <div class="form-check custom-check mb-5">
                            <input type="checkbox"
                                   name="acepto"
                                   class="form-check-input"
                                   id="acepto"
                                   {{ $mensaje->acepto ? 'checked' : '' }}>
                            <label class="form-check-label" for="acepto">
                                ✅ Acepto los términos y condiciones
                            </label>
                        </div>

                        {{-- ================================================
                             BOTONES DE ACCIÓN
                             d-flex + gap-3 + flex-wrap: fila de botones con separación
                             que se apilan automáticamente en pantallas pequeñas
                        ================================================ --}}
                        <div class="d-flex flex-wrap gap-3 justify-content-center">

                            {{-- Botón de envío: actualiza el registro en la BD --}}
                            <button type="submit" class="btn btn-actualizar px-5 py-3">
                                🚀 Actualizar Mensaje
                            </button>

                            {{-- Botón para cancelar y volver al listado de mensajes --}}
                            <a href="{{ route('mensajes') }}" class="btn btn-volver px-5 py-3">
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

    /* Título principal con gradiente de texto */
    .titulo-principal {
        background: linear-gradient(90deg, #ffffff, #c084fc, #f472b6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Texto descriptivo suave */
    .texto-secundario {
        color: #cbd5e1;
        font-size: 1.1rem;
    }

    /* Card con efecto glassmorphism */
    .glass-card {
        background: rgba(255, 255, 255, .08);
        backdrop-filter: blur(18px);
        border: 1px solid rgba(255, 255, 255, .08);
        box-shadow:
            0 0 25px rgba(139, 92, 246, .15),
            0 0 45px rgba(236, 72, 153, .08);
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

    /* Al enfocar: resalta con morado y leve escala */
    .custom-input:focus {
        border-color: #c084fc !important;
        box-shadow: 0 0 15px rgba(192, 132, 252, .35) !important;
        transform: scale(1.01);
    }

    .custom-input::placeholder { color: #cbd5e1; }

    .form-label { color: #f8fafc; }

    /* Contenedor del checkbox con fondo translúcido y borde suave */
    .custom-check {
        background: rgba(255, 255, 255, .05);
        padding: 15px 20px;
        border-radius: 15px;
        border: 1px solid rgba(255, 255, 255, .05);
    }

    .custom-check label { color: #e2e8f0; }

    /* Botón principal de actualizar con gradiente */
    .btn-actualizar {
        border: none;
        border-radius: 50px;
        font-weight: 600;
        color: white;
        background: linear-gradient(135deg, #8b5cf6, #ec4899);
        box-shadow: 0 0 25px rgba(236, 72, 153, .35);
        transition: .3s;
    }

    .btn-actualizar:hover {
        transform: translateY(-4px) scale(1.04);
        box-shadow:
            0 0 30px rgba(236, 72, 153, .5),
            0 0 45px rgba(139, 92, 246, .4);
        color: white;
    }

    /* Botón secundario de volver con fondo translúcido */
    .btn-volver {
        border-radius: 50px;
        font-weight: 600;
        border: 1px solid rgba(255, 255, 255, .15);
        background: rgba(255, 255, 255, .05);
        color: white;
        transition: .3s;
    }

    .btn-volver:hover {
        background: rgba(255, 255, 255, .12);
        transform: translateY(-3px);
        color: white;
    }

    /* Alerta de errores con fondo rojo translúcido */
    .alert-danger {
        background: rgba(220, 38, 38, .12);
        color: #fecaca;
        backdrop-filter: blur(12px);
        border: 1px solid rgba(248, 113, 113, .2);
    }

    /* Evita que el usuario redimensione el textarea manualmente */
    textarea { resize: none; }

    /* Ajustes responsive para pantallas menores a 768px */
    @media (max-width: 768px) {
        .titulo-principal { font-size: 2.4rem; }
        .card-body { padding: 2rem !important; }
    }

</style>

@endsection