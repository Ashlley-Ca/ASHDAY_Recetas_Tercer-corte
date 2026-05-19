{{-- ============================================================
     Vista: nosotros.blade.php
     Descripción: Página "Sobre nosotros" de ASHDAY Recetas.
     Incluye: hero, tarjetas informativas, formulario PQRS
     y sección del equipo creador.
     Extiende: layouts.app
     ============================================================ --}}

@extends('layouts.app')

{{-- Título de la pestaña del navegador --}}
@section('title', 'Nosotros')

@section('content')

<div class="container py-5">

    {{-- ======================================================
         SECCIÓN HERO
         Presenta la identidad de ASHDAY Recetas con un fondo
         glassmorphism y dos botones de acción principal.
         ====================================================== --}}
    <section class="nosotros-hero text-center mb-5">

        {{-- Efecto de luz decorativa en la esquina superior derecha --}}
        <div class="hero-light" aria-hidden="true"></div>

        {{-- Etiqueta decorativa (badge) --}}
        <span class="hero-badge">
            ✨ Comunidad gastronómica
        </span>

        <h1 class="display-3 fw-bold mt-4">
            Sobre
            <span class="text-gradient">ASHDAY Recetas</span>
        </h1>

        <p class="hero-text mx-auto mt-4">
            En <strong>ASHDAY Recetas</strong> creemos que cocinar es una
            experiencia llena de creatividad, pasión y momentos especiales.
            Compartimos recetas deliciosas, ideas innovadoras y consejos
            gastronómicos para inspirar a toda nuestra comunidad.
        </p>

        {{-- Botones de acción: explorar recetas y contacto --}}
        <div class="mt-4 d-flex justify-content-center gap-3 flex-wrap">
            <a href="{{ route('menu') }}" class="btn btn-receta btn-lg">
                🍽️ Explorar recetas
            </a>
            <a href="{{ route('contacto') }}" class="btn btn-glass btn-lg">
                📩 Contacto
            </a>
        </div>

    </section>

    {{-- ======================================================
         SECCIÓN TARJETAS INFORMATIVAS
         Tres tarjetas con misión, visión y comunidad.
         Usan glassmorphism y efecto hover de elevación.
         ====================================================== --}}
    <section class="mb-5" aria-label="Misión, visión y comunidad">

        <div class="row g-4">

            {{-- Tarjeta: Misión --}}
            <div class="col-md-4">
                <div class="info-card h-100">
                    <div class="icon-circle purple" aria-hidden="true">🍴</div>
                    <h3 class="mt-4 fw-bold">Nuestra misión</h3>
                    <p class="mt-3 opacity-75">
                        Inspirar a las personas a cocinar de manera
                        divertida, fácil y creativa desde casa.
                    </p>
                </div>
            </div>

            {{-- Tarjeta: Visión --}}
            <div class="col-md-4">
                <div class="info-card h-100">
                    <div class="icon-circle pink" aria-hidden="true">🚀</div>
                    <h3 class="mt-4 fw-bold">Nuestra visión</h3>
                    <p class="mt-3 opacity-75">
                        Construir una comunidad moderna donde compartir
                        recetas y experiencias gastronómicas.
                    </p>
                </div>
            </div>

            {{-- Tarjeta: Comunidad --}}
            <div class="col-md-4">
                <div class="info-card h-100">
                    <div class="icon-circle blue" aria-hidden="true">❤️</div>
                    <h3 class="mt-4 fw-bold">Nuestra comunidad</h3>
                    <p class="mt-3 opacity-75">
                        Personas apasionadas por la cocina, los sabores
                        y la creatividad culinaria.
                    </p>
                </div>
            </div>

        </div>

    </section>

    {{-- ======================================================
         SECCIÓN FORMULARIO PQRS
         Permite al usuario enviar peticiones, quejas, reclamos,
         sugerencias o felicitaciones.
         MEJORA: se añaden atributos `id` y `for` para accesibilidad,
         se corrige el autocomplete y se añaden maxlength en los campos.
         ====================================================== --}}
    <section class="pqrs-section" aria-labelledby="pqrs-titulo">

        <div class="row align-items-center g-5">

            {{-- Columna informativa izquierda --}}
            <div class="col-lg-5">
                <span class="hero-badge">📩 Atención al usuario</span>
                <h2 id="pqrs-titulo" class="fw-bold display-5 mt-4">
                    Formulario
                    <span class="text-gradient">PQRS</span>
                </h2>
                <p class="mt-4 fs-5 opacity-75">
                    Tu opinión es muy importante para nosotros.
                    Puedes enviarnos peticiones, quejas, reclamos,
                    sugerencias o felicitaciones.
                </p>

                {{-- Lista de beneficios del formulario --}}
                <div class="feature-list mt-4" aria-label="Beneficios">
                    <div class="feature-item">✅ Respuesta rápida</div>
                    <div class="feature-item">✅ Atención personalizada</div>
                    <div class="feature-item">✅ Mejora continua del proyecto</div>
                </div>
            </div>

            {{-- Columna del formulario derecha --}}
            <div class="col-lg-7">
                <div class="form-card">

                    {{-- Mensaje de éxito tras enviar el formulario (sesión flash) --}}
                    @if(session('success'))
                        <div class="alert alert-custom-success" role="alert">
                            <i class="bi bi-check-circle-fill" aria-hidden="true"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- MEJORA: Se muestran errores de validación globales si los hay --}}
                    @if($errors->any())
                        <div class="alert alert-danger rounded-4 mb-4" role="alert">
                            <ul class="mb-0 ps-3">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Formulario PQRS: método POST con protección CSRF --}}
                    <form action="{{ route('pqrs.store') }}" method="POST" novalidate>
                        @csrf

                        <div class="row">

                            {{-- Campo: Nombres --}}
                            <div class="col-md-6 mb-4">
                                <label for="nombres" class="form-label">👤 Nombres</label>
                                <input
                                    type="text"
                                    id="nombres"
                                    name="nombres"
                                    class="form-control @error('nombres') is-invalid @enderror"
                                    placeholder="Ingresa tu nombre"
                                    value="{{ old('nombres') }}"
                                    maxlength="80"
                                    autocomplete="given-name"
                                    required
                                >
                                {{-- Mensaje de error individual para nombres --}}
                                @error('nombres')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Campo: Apellidos --}}
                            <div class="col-md-6 mb-4">
                                <label for="apellidos" class="form-label">👥 Apellidos</label>
                                <input
                                    type="text"
                                    id="apellidos"
                                    name="apellidos"
                                    class="form-control @error('apellidos') is-invalid @enderror"
                                    placeholder="Ingresa tu apellido"
                                    value="{{ old('apellidos') }}"
                                    maxlength="80"
                                    autocomplete="family-name"
                                    required
                                >
                                @error('apellidos')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        {{-- Campo: Correo electrónico --}}
                        <div class="mb-4">
                            <label for="correo" class="form-label">📧 Correo electrónico</label>
                            <input
                                type="email"
                                id="correo"
                                name="correo"
                                class="form-control @error('correo') is-invalid @enderror"
                                placeholder="ejemplo@email.com"
                                value="{{ old('correo') }}"
                                maxlength="120"
                                autocomplete="email"
                                required
                            >
                            @error('correo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Campo: Tipo de mensaje (select) --}}
                        <div class="mb-4">
                            <label for="tipo" class="form-label">📌 Tipo de mensaje</label>
                            <select
                                id="tipo"
                                name="tipo"
                                class="form-select @error('tipo') is-invalid @enderror"
                                required
                            >
                                <option value="" disabled {{ old('tipo') ? '' : 'selected' }}>
                                    Selecciona una opción
                                </option>
                                {{-- MEJORA: se marca la opción previa con old() para repoblar tras error --}}
                                @foreach(['Petición','Queja','Reclamo','Sugerencia','Felicitación'] as $opcion)
                                    <option value="{{ $opcion }}" {{ old('tipo') === $opcion ? 'selected' : '' }}>
                                        {{ $opcion }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tipo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Campo: Mensaje (textarea) --}}
                        <div class="mb-4">
                            <label for="mensaje" class="form-label">💬 Mensaje</label>
                            <textarea
                                id="mensaje"
                                name="mensaje"
                                rows="5"
                                class="form-control @error('mensaje') is-invalid @enderror"
                                placeholder="Escribe aquí tu mensaje..."
                                maxlength="1000"
                                required
                            >{{ old('mensaje') }}</textarea>
                            @error('mensaje')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Checkbox: aceptar términos y condiciones --}}
                        <div class="form-check custom-check mb-4">
                            <input
                                type="checkbox"
                                id="terminos"
                                name="terminos"
                                value="1"
                                class="form-check-input @error('terminos') is-invalid @enderror"
                                required
                            >
                            <label class="form-check-label" for="terminos">
                                Acepto los términos y condiciones
                            </label>
                            @error('terminos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Botón de envío --}}
                        <button type="submit" class="btn btn-receta w-100 btn-lg">
                            📤 Enviar mensaje
                        </button>

                    </form>

                </div>
            </div>

        </div>

    </section>

    {{-- ======================================================
         SECCIÓN EQUIPO CREADOR
         Presenta a las desarrolladoras del proyecto.
         ====================================================== --}}
    <section class="creator-section text-center mt-5" aria-labelledby="equipo-titulo">

        <div class="creator-card">

            <span class="hero-badge">👩‍💻 Equipo creador</span>

            <h2 id="equipo-titulo" class="fw-bold mt-4 mb-4">
                Proyecto desarrollado por
            </h2>

            <div class="row justify-content-center g-4">

                {{-- Creadora 1 --}}
                <div class="col-md-4">
                    <div class="creator-item">
                        <div class="creator-avatar" aria-hidden="true">👩‍🍳</div>
                        <h5 class="fw-bold mt-3">Ashlley Alejandra Castro</h5>
                    </div>
                </div>

                {{-- Creadora 2 --}}
                <div class="col-md-4">
                    <div class="creator-item">
                        <div class="creator-avatar" aria-hidden="true">👩‍🍳</div>
                        <h5 class="fw-bold mt-3">Dayana Liseth Cuaran</h5>
                    </div>
                </div>

            </div>

            <p class="mt-4 opacity-75">
                🚀 Proyecto académico — Programación Avanzada 2026
            </p>

        </div>

    </section>

</div>

{{-- ============================================================
     ESTILOS DE LA VISTA
     Se usa <style> embebido para mantener los estilos junto
     a la vista. En un proyecto más grande considera moverlos
     a un archivo CSS/SASS independiente.
     ============================================================ --}}
<style>

/* -------------------------------------------------------
   HERO PRINCIPAL
   Fondo glassmorphism con gradiente de múltiples colores.
   ------------------------------------------------------- */
.nosotros-hero {
    position: relative;
    padding: 100px 35px;
    border-radius: 35px;
    overflow: hidden;
    background: linear-gradient(
        135deg,
        rgba(139, 92, 246, .20),
        rgba(236, 72, 153, .16),
        rgba(6, 182, 212, .14)
    );
    border: 1px solid rgba(255, 255, 255, .08);
    backdrop-filter: blur(18px);
    box-shadow: 0 0 40px rgba(139, 92, 246, .25);
}

/* Luz decorativa posicionada en la esquina superior derecha */
.hero-light {
    position: absolute;
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, rgba(255, 255, 255, .14), transparent 70%);
    top: -250px;
    right: -150px;
    pointer-events: none; /* MEJORA: evita que bloquee clics */
}

/* -------------------------------------------------------
   TEXTO CON GRADIENTE
   Aplica degradado sobre texto usando clip de fondo.
   ------------------------------------------------------- */
.text-gradient {
    background: linear-gradient(90deg, #c084fc, #f472b6, #22d3ee);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text; /* MEJORA: propiedad estándar además del prefijo */
}

.hero-text {
    max-width: 750px;
    font-size: 18px;
    line-height: 1.9;
    opacity: .85;
}

/* -------------------------------------------------------
   BADGE / ETIQUETA
   Pequeña pastilla decorativa con efecto glass.
   ------------------------------------------------------- */
.hero-badge {
    display: inline-block;
    padding: 10px 18px;
    border-radius: 30px;
    background: rgba(255, 255, 255, .08);
    border: 1px solid rgba(255, 255, 255, .08);
    backdrop-filter: blur(12px);
}

/* -------------------------------------------------------
   TARJETAS INFORMATIVAS (Misión / Visión / Comunidad)
   Efecto glassmorphism con hover de elevación y escala.
   ------------------------------------------------------- */
.info-card {
    padding: 40px 30px;
    border-radius: 30px;
    background: rgba(255, 255, 255, .05);
    border: 1px solid rgba(255, 255, 255, .08);
    backdrop-filter: blur(15px);
    text-align: center;
    transition: transform .4s ease, box-shadow .4s ease; /* MEJORA: transición explícita por propiedad */
    box-shadow: 0 8px 30px rgba(0, 0, 0, .22);
}

.info-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 0 35px rgba(236, 72, 153, .25);
}

/* -------------------------------------------------------
   CÍRCULOS DE ICONOS
   Avatar circular con gradiente de color según variante.
   ------------------------------------------------------- */
.icon-circle {
    width: 90px;
    height: 90px;
    margin: auto;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 35px;
    color: white;
    box-shadow: 0 0 25px rgba(255, 255, 255, .18);
}

/* Variantes de color para cada tarjeta */
.purple { background: linear-gradient(135deg, #8b5cf6, #a855f7); }
.pink   { background: linear-gradient(135deg, #ec4899, #f472b6); }
.blue   { background: linear-gradient(135deg, #06b6d4, #3b82f6); }

/* -------------------------------------------------------
   SECCIÓN PQRS
   Contenedor principal del formulario.
   ------------------------------------------------------- */
.pqrs-section {
    margin-top: 70px;
    padding: 60px 40px;
    border-radius: 35px;
    background: rgba(255, 255, 255, .05);
    border: 1px solid rgba(255, 255, 255, .08);
    backdrop-filter: blur(18px);
}

/* Ítems de la lista de características */
.feature-item {
    padding: 14px 18px;
    margin-bottom: 12px;
    border-radius: 18px;
    background: rgba(255, 255, 255, .05);
    border: 1px solid rgba(255, 255, 255, .06);
}

/* -------------------------------------------------------
   TARJETA DEL FORMULARIO
   Contenedor visual con fondo glass para los campos.
   ------------------------------------------------------- */
.form-card {
    padding: 40px;
    border-radius: 30px;
    background: rgba(255, 255, 255, .06);
    border: 1px solid rgba(255, 255, 255, .08);
    backdrop-filter: blur(18px);
    box-shadow: 0 8px 35px rgba(0, 0, 0, .25);
}

/* -------------------------------------------------------
   CAMPOS DE FORMULARIO
   Inputs y selects con estilo oscuro translúcido.
   ------------------------------------------------------- */
.form-control,
.form-select {
    background: rgba(255, 255, 255, .06) !important;
    border: 1px solid rgba(255, 255, 255, .08) !important;
    border-radius: 18px !important;
    padding: 14px !important;
    color: white !important;
}

/* Estado de foco con acento violeta */
.form-control:focus,
.form-select:focus {
    border-color: #c084fc !important;
    box-shadow: 0 0 20px rgba(192, 132, 252, .35) !important;
    outline: none; /* MEJORA: elimina el outline nativo en foco */
}

.form-control::placeholder { color: #cbd5e1; }

/* Opciones del select (hereda el fondo oscuro del sistema) */
.form-select option { background: #1e1b4b; }

/* Etiquetas de campo */
.form-label {
    font-weight: 600;
    margin-bottom: 10px;
}

/* -------------------------------------------------------
   CHECKBOX DE TÉRMINOS
   Contenedor con fondo sutil para destacar la aceptación.
   ------------------------------------------------------- */
.custom-check {
    padding: 12px;
    border-radius: 16px;
    background: rgba(255, 255, 255, .04);
}

/* -------------------------------------------------------
   BOTONES
   ------------------------------------------------------- */

/* Botón principal con gradiente violeta-rosa */
.btn-receta {
    background: linear-gradient(135deg, #8b5cf6, #ec4899);
    border: none;
    color: white;
    padding: 14px 28px;
    border-radius: 40px;
    font-weight: 600;
    transition: transform .3s ease, box-shadow .3s ease;
    box-shadow: 0 0 25px rgba(236, 72, 153, .30);
}

.btn-receta:hover {
    transform: translateY(-3px) scale(1.03);
    color: white;
    box-shadow: 0 0 30px rgba(236, 72, 153, .45);
}

/* Botón glass transparente */
.btn-glass {
    background: rgba(255, 255, 255, .05);
    border: 1px solid rgba(255, 255, 255, .10);
    color: white;
    border-radius: 40px;
    padding: 14px 28px;
    backdrop-filter: blur(10px);
    transition: background .3s ease;
}

.btn-glass:hover {
    background: rgba(255, 255, 255, .10);
    color: white;
}

/* -------------------------------------------------------
   ALERTA DE ÉXITO
   Aparece tras enviar el formulario correctamente.
   ------------------------------------------------------- */
.alert-custom-success {
    background: rgba(34, 197, 94, .15);
    border: 1px solid rgba(34, 197, 94, .25);
    padding: 18px;
    border-radius: 18px;
    color: #d1fae5;
    margin-bottom: 20px; /* MEJORA: separación del formulario */
}

/* -------------------------------------------------------
   SECCIÓN EQUIPO CREADOR
   ------------------------------------------------------- */
.creator-card {
    padding: 60px 30px;
    border-radius: 35px;
    background: rgba(255, 255, 255, .05);
    border: 1px solid rgba(255, 255, 255, .08);
    backdrop-filter: blur(18px);
}

.creator-item {
    padding: 25px;
    border-radius: 25px;
    background: rgba(255, 255, 255, .04);
    transition: transform .3s ease, background .3s ease;
}

.creator-item:hover {
    transform: translateY(-6px);
    background: rgba(255, 255, 255, .06);
}

.creator-avatar {
    width: 90px;
    height: 90px;
    margin: auto;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 35px;
    background: linear-gradient(135deg, #8b5cf6, #ec4899);
    box-shadow: 0 0 25px rgba(236, 72, 153, .35);
}

/* -------------------------------------------------------
   RESPONSIVE — pantallas menores a 768px
   ------------------------------------------------------- */
@media (max-width: 768px) {
    .nosotros-hero  { padding: 70px 20px; }
    .nosotros-hero h1 { font-size: 42px; }
    .form-card      { padding: 25px; }
    .pqrs-section   { padding: 35px 20px; }
}

</style>

@endsection