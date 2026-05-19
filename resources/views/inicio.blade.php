{{-- Extiende el layout principal de la aplicación (layouts/app.blade.php) --}}
@extends('layouts.app')

{{-- Define el título de la pestaña del navegador --}}
@section('title', 'Inicio')

{{-- ============================================================
     CONTENIDO PRINCIPAL
     Se inyecta en el @yield('content') del layout base
============================================================ --}}
@section('content')

{{-- ============================================================
     SECCIÓN 1: HERO PRINCIPAL
     Presenta la plataforma con imagen, título, descripción,
     botones de acción y estadísticas rápidas
============================================================ --}}
<section class="mb-5">

    <div class="card border-0 overflow-hidden p-0 hero-home">

        <div class="row g-0 align-items-center">

            {{-- COLUMNA IZQUIERDA: Texto, botones y estadísticas --}}
            <div class="col-lg-6 p-5">

                {{-- Badge descriptivo de la plataforma --}}
                <span class="badge bg-success mb-3 px-3 py-2 rounded-pill fs-6">
                    🔥 Plataforma gastronómica moderna
                </span>

                {{-- Título principal con gradiente de texto --}}
                <h1 class="display-2 fw-bold mb-4">
                    🍓 Bienvenidos a
                    <span class="text-gradient">ASHDAY Recetas</span>
                </h1>

                {{-- Descripción introductoria de la plataforma --}}
                <p class="lead opacity-75 mb-4">
                    Descubre recetas increíbles, comparte tus platos favoritos y
                    forma parte de una comunidad apasionada por la cocina.
                </p>

                {{-- ================================================
                     BOTONES DE ACCIÓN
                     @auth / @guest: muestra opciones distintas según
                     si el usuario tiene sesión activa o es invitado
                ================================================ --}}
                <div class="d-flex flex-wrap gap-3 mt-4">

                    {{-- Botón visible para todos los usuarios --}}
                    <a href="{{ route('recetas') }}" class="btn btn-receta btn-lg px-5">
                        🍽️ Explorar recetas
                    </a>

                    {{-- Solo visible para usuarios autenticados --}}
                    @auth
                        <a href="{{ route('recetas.crear') }}"
                           class="btn btn-outline-light btn-lg rounded-pill px-5">
                            ➕ Crear receta
                        </a>
                    @endauth

                    {{-- Solo visible para usuarios invitados (no autenticados) --}}
                    @guest
                        <a href="{{ route('register') }}"
                           class="btn btn-outline-light btn-lg rounded-pill px-5">
                            ✨ Únete gratis
                        </a>
                    @endguest

                </div>

                {{-- ================================================
                     ESTADÍSTICAS RÁPIDAS
                     Tres mini-tarjetas con cifras destacadas
                     de la plataforma
                ================================================ --}}
                <div class="row mt-5 g-4">

                    <div class="col-4">
                        <div class="mini-stat text-center">
                            <h2>500+</h2>
                            <p>Recetas</p>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mini-stat text-center">
                            <h2>120+</h2>
                            <p>Usuarios</p>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="mini-stat text-center">
                            <h2>24/7</h2>
                            <p>Creatividad</p>
                        </div>
                    </div>

                </div>

            </div>

            {{-- COLUMNA DERECHA: Imagen decorativa del hero
                 loading="lazy": carga diferida para mejor rendimiento
                 object-fit: cover en CSS mantiene proporciones sin deformarse --}}
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=1974&auto=format&fit=crop"
                     class="img-fluid hero-image"
                     alt="Plato de comida representativo de ASHDAY Recetas"
                     loading="lazy">
            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     SECCIÓN 2: CATEGORÍAS
     Cuatro cards con las categorías principales de recetas
     col-md-3: cada card ocupa un cuarto del ancho en pantallas medianas
============================================================ --}}
<section class="mb-5">

    <div class="text-center mb-5">
        <h2 class="display-5 fw-bold">🍴 Explora Categorías</h2>
        <p class="opacity-75">Encuentra recetas para cualquier momento del día.</p>
    </div>

    <div class="row g-4">

        {{-- Categoría: Desayunos --}}
        <div class="col-md-3 col-sm-6">
            <div class="card categoria-card text-center p-4 h-100">
                <div class="emoji">🥐</div>
                <h4 class="fw-bold mt-3">Desayunos</h4>
                <p class="opacity-75">Empieza tu mañana con energía y sabor.</p>
            </div>
        </div>

        {{-- Categoría: Almuerzos --}}
        <div class="col-md-3 col-sm-6">
            <div class="card categoria-card text-center p-4 h-100">
                <div class="emoji">🍛</div>
                <h4 class="fw-bold mt-3">Almuerzos</h4>
                <p class="opacity-75">Recetas perfectas para compartir en familia.</p>
            </div>
        </div>

        {{-- Categoría: Cenas --}}
        <div class="col-md-3 col-sm-6">
            <div class="card categoria-card text-center p-4 h-100">
                <div class="emoji">🍲</div>
                <h4 class="fw-bold mt-3">Cenas</h4>
                <p class="opacity-75">Platos deliciosos para terminar el día.</p>
            </div>
        </div>

        {{-- Categoría: Postres --}}
        <div class="col-md-3 col-sm-6">
            <div class="card categoria-card text-center p-4 h-100">
                <div class="emoji">🍰</div>
                <h4 class="fw-bold mt-3">Postres</h4>
                <p class="opacity-75">El toque dulce que todos aman.</p>
            </div>
        </div>

    </div>

</section>


{{-- ============================================================
     SECCIÓN 3: SOBRE EL PROYECTO
     Información del proyecto académico e imagen decorativa
============================================================ --}}
<section class="mb-5">

    <div class="card p-5 info-card">

        <div class="row align-items-center">

            {{-- Columna izquierda: texto descriptivo y créditos --}}
            <div class="col-lg-7">

                <h2 class="display-5 fw-bold mb-4">✨ Sobre ASHDAY Recetas</h2>

                <p class="lead opacity-75">
                    ASHDAY Recetas nació como un proyecto académico enfocado en
                    el desarrollo web moderno utilizando Laravel.
                </p>

                <p class="opacity-75">
                    La plataforma busca crear un espacio interactivo donde las personas
                    puedan descubrir nuevas recetas, compartir experiencias gastronómicas
                    y conectar mediante la cocina.
                </p>

                {{-- Créditos de las creadoras del proyecto --}}
                <div class="mt-4">
                    <h5 class="fw-bold">👩‍🍳 Creadoras del proyecto</h5>
                    <p class="mb-1">Ashlley Alejandra Castro</p>
                    <p>Dayana Liseth Cuaran</p>
                </div>

            </div>

            {{-- Columna derecha: imagen decorativa de comida
                 loading="lazy": carga diferida para mejor rendimiento --}}
            <div class="col-lg-5 text-center mt-4 mt-lg-0">
                <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?q=80&w=1974&auto=format&fit=crop"
                     class="img-fluid rounded-4 shadow-lg"
                     alt="Fotografía de comida saludable"
                     loading="lazy">
            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     SECCIÓN 4: CALL TO ACTION (CTA) FINAL
     Invita al usuario a registrarse o crear una receta
     según su estado de autenticación
============================================================ --}}
<section class="text-center py-5">

    <div class="hero-final p-5 rounded-5">

        <h2 class="display-4 fw-bold mb-4">🚀 ¿Listo para cocinar?</h2>

        <p class="lead mb-4">
            Únete a nuestra comunidad y comparte tus mejores recetas.
        </p>

        {{-- Botón para usuarios autenticados: ir a crear receta --}}
        @auth
            <a href="{{ route('recetas.crear') }}" class="btn btn-receta btn-lg px-5">
                ➕ Publicar receta
            </a>
        @endauth

        {{-- Botón para invitados: ir a registro --}}
        @guest
            <a href="{{ route('register') }}" class="btn btn-receta btn-lg px-5">
                ✨ Crear cuenta
            </a>
        @endguest

    </div>

</section>


{{-- ============================================================
     ESTILOS ESPECÍFICOS DE ESTA VISTA
     Se definen aquí para no afectar el resto de la aplicación
============================================================ --}}
<style>

    /* Card del hero principal con gradiente de fondo y glassmorphism */
    .hero-home {
        background: linear-gradient(
            135deg,
            rgba(139, 92, 246, 0.18),
            rgba(236, 72, 153, 0.12),
            rgba(6, 182, 212, 0.10)
        );
        backdrop-filter: blur(18px);
        border: 1px solid rgba(255, 255, 255, 0.08);
        box-shadow: 0 0 35px rgba(139, 92, 246, 0.2);
    }

    /* Clase utilitaria para texto con gradiente de color */
    .text-gradient {
        background: linear-gradient(90deg, #c084fc, #f472b6, #22d3ee);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Imagen del hero: ocupa toda la altura de la columna sin deformarse */
    .hero-image {
        height: 100%;
        object-fit: cover;
        min-height: 600px;
        transition: .5s;
    }

    /* Leve zoom al hacer hover sobre la imagen del hero */
    .hero-image:hover { transform: scale(1.03); }

    /* Mini tarjetas de estadísticas con fondo translúcido */
    .mini-stat {
        background: rgba(255, 255, 255, 0.05);
        padding: 20px;
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.08);
    }

    /* Números de estadísticas en color cian destacado */
    .mini-stat h2 {
        font-weight: 700;
        color: #22d3ee;
    }

    /* Cards de categorías con animación de elevación al hacer hover */
    .categoria-card {
        transition: .4s;
        overflow: hidden;
        position: relative;
    }

    .categoria-card:hover { transform: translateY(-12px) scale(1.03); }

    /* Emoji grande con sombra luminosa para las categorías */
    .emoji {
        font-size: 70px;
        filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.4));
    }

    /* Card de información del proyecto con fondo muy sutil */
    .info-card {
        background: linear-gradient(
            135deg,
            rgba(255, 255, 255, 0.05),
            rgba(255, 255, 255, 0.03)
        );
    }

    /* Sección CTA final con gradiente morado-rosado */
    .hero-final {
        background: linear-gradient(
            135deg,
            rgba(139, 92, 246, 0.25),
            rgba(236, 72, 153, 0.20)
        );
        border: 1px solid rgba(255, 255, 255, 0.08);
        box-shadow: 0 0 40px rgba(236, 72, 153, 0.18);
    }

    /* Responsive: reduce la altura mínima de la imagen en pantallas menores a 992px */
    @media (max-width: 992px) {
        .hero-image { min-height: 350px; }
    }

</style>

@endsection