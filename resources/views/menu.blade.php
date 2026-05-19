{{-- Extiende el layout principal de la aplicación (layouts/app.blade.php) --}}
@extends('layouts.app')

{{-- Define el título de la pestaña del navegador --}}
@section('title', 'Menú')

{{-- ============================================================
     CONTENIDO PRINCIPAL
     Se inyecta en el @yield('content') del layout base
============================================================ --}}
@section('content')

<div class="container py-5">

    {{-- ============================================================
         SECCIÓN 1: HERO PRINCIPAL
         Encabezado destacado con gradiente, glassmorphism,
         badge descriptivo, título, descripción y botones de acción
    ============================================================ --}}
    <section class="menu-hero text-center mb-5">

        {{-- Elemento decorativo de luz (orbe radial en esquina superior derecha) --}}
        <div class="hero-glow"></div>

        {{-- Badge descriptivo del tipo de contenido --}}
        <span class="hero-badge">🍴 Experiencias gastronómicas</span>

        <h1 class="display-3 fw-bold mt-4">
            Recetas
            <span class="text-gradient">Destacadas</span>
        </h1>

        <p class="hero-text mx-auto mt-4">
            Descubre sabores únicos preparados con creatividad,
            ingredientes frescos y el estilo moderno de
            <strong>ASHDAY Recetas</strong>.
        </p>

        {{-- Botones de acción: crear receta y contacto
             @auth en el layout controla si se muestra "Crear receta" --}}
        <div class="mt-4 d-flex justify-content-center gap-3 flex-wrap">
            <a href="{{ route('recetas.crear') }}" class="btn btn-receta btn-lg">
                ➕ Crear receta
            </a>
            <a href="{{ route('contacto') }}" class="btn btn-outline-glass btn-lg">
                ✨ Contáctanos
            </a>
        </div>

    </section>

    {{-- ============================================================
         SECCIÓN 2: TARJETAS DE RECETAS DESTACADAS
         Tres recetas estáticas de muestra con imagen, categoría,
         tiempo, título, descripción, rating y botón de acción
         col-lg-4 col-md-6: 3 columnas en escritorio, 2 en tablet
    ============================================================ --}}
    <div class="row g-4">

        {{-- ================================================
             RECETA 1: Hamburguesa Artesanal
        ================================================ --}}
        <div class="col-lg-4 col-md-6">
            <div class="card receta-card h-100">

                {{-- Contenedor de imagen con overlay de badge
                     overflow:hidden en CSS permite el zoom sin salir del borde --}}
                <div class="img-container">
                    <img src="https://images.unsplash.com/photo-1551782450-a2132b4ba21d"
                         class="card-img-top"
                         alt="Hamburguesa artesanal gourmet"
                         loading="lazy">

                    {{-- Badge superpuesto sobre la imagen (position:absolute en CSS) --}}
                    <div class="img-overlay">
                        <span class="categoria-badge">🔥 Popular</span>
                    </div>
                </div>

                <div class="card-body">

                    {{-- Mini badges: categoría y tiempo de preparación --}}
                    <div class="d-flex justify-content-between mb-3">
                        <span class="mini-badge">🍔 Comida rápida</span>
                        <span class="mini-badge time">⏱️ 25 min</span>
                    </div>

                    <h3 class="card-title">Hamburguesa Artesanal</h3>

                    <p class="card-text">
                        Una hamburguesa gourmet preparada con carne
                        jugosa, pan artesanal y una explosión de sabor
                        en cada mordida.
                    </p>

                    {{-- Rating visual con emojis y botón de acción --}}
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div class="rating">⭐⭐⭐⭐⭐</div>
                        <button class="btn btn-receta-sm">Ver receta</button>
                    </div>

                </div>
            </div>
        </div>

        {{-- ================================================
             RECETA 2: Panqueques Dulces
        ================================================ --}}
        <div class="col-lg-4 col-md-6">
            <div class="card receta-card h-100">

                <div class="img-container">
                    <img src="https://images.unsplash.com/photo-1490474418585-ba9bad8fd0ea"
                         class="card-img-top"
                         alt="Panqueques dulces con frutas"
                         loading="lazy">

                    {{-- Badge rosa: variante de color definida con clase .pink en CSS --}}
                    <div class="img-overlay">
                        <span class="categoria-badge pink">🍓 Dulce</span>
                    </div>
                </div>

                <div class="card-body">

                    <div class="d-flex justify-content-between mb-3">
                        <span class="mini-badge">🥞 Desayuno</span>
                        <span class="mini-badge time">⏱️ 15 min</span>
                    </div>

                    <h3 class="card-title">Panqueques Dulces</h3>

                    <p class="card-text">
                        Panqueques suaves acompañados de frutas,
                        miel y toppings irresistibles para empezar
                        el día con energía.
                    </p>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div class="rating">⭐⭐⭐⭐⭐</div>
                        <button class="btn btn-receta-sm">Ver receta</button>
                    </div>

                </div>
            </div>
        </div>

        {{-- ================================================
             RECETA 3: Ensalada Saludable
        ================================================ --}}
        <div class="col-lg-4 col-md-6">
            <div class="card receta-card h-100">

                <div class="img-container">
                    <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c"
                         class="card-img-top"
                         alt="Ensalada saludable con vegetales frescos"
                         loading="lazy">

                    {{-- Badge azul: variante de color definida con clase .blue en CSS --}}
                    <div class="img-overlay">
                        <span class="categoria-badge blue">🥗 Saludable</span>
                    </div>
                </div>

                <div class="card-body">

                    <div class="d-flex justify-content-between mb-3">
                        <span class="mini-badge">🌱 Fitness</span>
                        <span class="mini-badge time">⏱️ 10 min</span>
                    </div>

                    <h3 class="card-title">Ensalada Saludable</h3>

                    <p class="card-text">
                        Vegetales frescos, proteínas ligeras y una
                        mezcla perfecta para disfrutar una comida
                        equilibrada y deliciosa.
                    </p>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div class="rating">⭐⭐⭐⭐☆</div>
                        <button class="btn btn-receta-sm">Ver receta</button>
                    </div>

                </div>
            </div>
        </div>

    </div>

    {{-- ============================================================
         SECCIÓN 3: SECCIÓN EXTRA — Cocina con pasión
         Texto motivacional + imagen decorativa en dos columnas
         mt-lg-0: elimina margen superior de la imagen en escritorio
    ============================================================ --}}
    <section class="extra-section mt-5">

        <div class="row align-items-center">

            {{-- Columna izquierda: texto y botón de acción --}}
            <div class="col-lg-6 mb-4 mb-lg-0">

                <h2 class="fw-bold mb-4">✨ Cocina con pasión y creatividad</h2>

                <p class="opacity-75 fs-5">
                    En ASHDAY Recetas creemos que cocinar es una
                    experiencia divertida, artística y llena de sabor.
                </p>

                <p class="opacity-75">
                    Comparte tus mejores platos, descubre nuevas
                    ideas y conecta con una comunidad apasionada
                    por la gastronomía.
                </p>

                <a href="{{ route('recetas.crear') }}" class="btn btn-receta mt-3">
                    🚀 Empezar ahora
                </a>

            </div>

            {{-- Columna derecha: imagen decorativa de chef
                 loading="lazy": carga diferida para mejor rendimiento --}}
            <div class="col-lg-6 text-center">
                <img src="https://images.unsplash.com/photo-1515003197210-e0cd71810b5f"
                     class="img-fluid extra-img"
                     alt="Chef preparando comida"
                     loading="lazy">
            </div>

        </div>

    </section>

    {{-- ============================================================
         SECCIÓN 4: CRÉDITOS DEL PROYECTO
         Muestra las creadoras y el nombre del proyecto académico
    ============================================================ --}}
    <div class="creator-box text-center mt-5">

        <h4 class="fw-bold mb-3">👩‍💻 Proyecto desarrollado por</h4>
        <p class="mb-1"><strong>Ashlley Alejandra Castro</strong></p>
        <p class="mb-3"><strong>Dayana Liseth Cuaran</strong></p>

        <span class="project-badge">🚀 Proyecto académico — ASHDAY Recetas</span>

    </div>

</div>

{{-- ============================================================
     ESTILOS ESPECÍFICOS DE ESTA VISTA
     Se definen aquí para no afectar el resto de la aplicación
============================================================ --}}
<style>

    /* ================================================
       HERO: sección de encabezado con glassmorphism
    ================================================ */

    .menu-hero {
        position: relative;
        padding: 90px 30px;
        border-radius: 35px;
        overflow: hidden;
        background: linear-gradient(
            135deg,
            rgba(139, 92, 246, .22),
            rgba(236, 72, 153, .16),
            rgba(6, 182, 212, .14)
        );
        border: 1px solid rgba(255, 255, 255, .08);
        backdrop-filter: blur(18px);
        box-shadow: 0 0 35px rgba(139, 92, 246, .22);
    }

    /* Orbe de luz decorativo en esquina superior derecha del hero */
    .hero-glow {
        position: absolute;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(255, 255, 255, .14), transparent 70%);
        top: -250px;
        right: -150px;
    }

    /* ================================================
       BADGES DEL HERO Y DEL PIE DE PÁGINA
    ================================================ */

    .hero-badge,
    .project-badge {
        display: inline-block;
        padding: 10px 18px;
        border-radius: 30px;
        background: rgba(255, 255, 255, .08);
        border: 1px solid rgba(255, 255, 255, .08);
        backdrop-filter: blur(12px);
    }

    /* ================================================
       TEXTO CON GRADIENTE DE COLOR
    ================================================ */

    .text-gradient {
        background: linear-gradient(90deg, #c084fc, #f472b6, #22d3ee);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Párrafo descriptivo del hero */
    .hero-text {
        max-width: 700px;
        font-size: 18px;
        line-height: 1.8;
        opacity: .85;
    }

    /* ================================================
       CARDS DE RECETAS con glassmorphism
    ================================================ */

    .receta-card {
        background: rgba(255, 255, 255, .06);
        border: 1px solid rgba(255, 255, 255, .08);
        backdrop-filter: blur(16px);
        border-radius: 30px;
        overflow: hidden;
        transition: .4s ease;
        color: white;
        box-shadow: 0 8px 30px rgba(0, 0, 0, .25);
    }

    /* Eleva y escala la card al hacer hover */
    .receta-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 12px 40px rgba(236, 72, 153, .22);
    }

    /* ================================================
       IMAGEN DE LA CARD
       overflow:hidden en .img-container contiene el zoom
    ================================================ */

    .img-container {
        position: relative;
        overflow: hidden;
    }

    .card-img-top {
        height: 280px;
        object-fit: cover;  /* Recorta la imagen manteniendo proporciones */
        transition: .5s;
    }

    /* Zoom en la imagen al hacer hover sobre la card */
    .receta-card:hover .card-img-top { transform: scale(1.08); }

    /* Badge superpuesto sobre la imagen (esquina superior izquierda) */
    .img-overlay {
        position: absolute;
        top: 20px;
        left: 20px;
    }

    /* ================================================
       BADGES DE CATEGORÍA (sobre las imágenes)
       Tres variantes de color: naranja (default), rosa, azul
    ================================================ */

    .categoria-badge {
        padding: 10px 18px;
        border-radius: 30px;
        font-size: 14px;
        font-weight: 600;
        background: linear-gradient(135deg, #f59e0b, #ef4444); /* Naranja-rojo (Popular) */
        color: white;
        box-shadow: 0 0 20px rgba(239, 68, 68, .4);
    }

    .categoria-badge.pink { background: linear-gradient(135deg, #ec4899, #f472b6); } /* Rosado (Dulce) */
    .categoria-badge.blue { background: linear-gradient(135deg, #06b6d4, #3b82f6); } /* Azul (Saludable) */

    /* ================================================
       MINI BADGES: categoría y tiempo
    ================================================ */

    .mini-badge {
        padding: 8px 14px;
        border-radius: 20px;
        background: rgba(255, 255, 255, .08);
        font-size: 13px;
    }

    /* Variante morada para el badge de tiempo */
    .time { background: rgba(139, 92, 246, .18); }

    /* ================================================
       TIPOGRAFÍA DE LAS CARDS
    ================================================ */

    .card-title {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .card-text {
        opacity: .82;
        line-height: 1.7;
    }

    /* ================================================
       BOTONES
    ================================================ */

    /* Botón principal y botón pequeño comparten base */
    .btn-receta,
    .btn-receta-sm {
        background: linear-gradient(135deg, #8b5cf6, #ec4899);
        border: none;
        color: white;
        font-weight: 600;
        border-radius: 40px;
        transition: .3s;
        box-shadow: 0 0 20px rgba(236, 72, 153, .30);
    }

    .btn-receta    { padding: 14px 28px; }
    .btn-receta-sm { padding: 10px 18px; }

    .btn-receta:hover,
    .btn-receta-sm:hover {
        transform: translateY(-3px) scale(1.04);
        color: white;
        box-shadow: 0 0 25px rgba(236, 72, 153, .45);
    }

    /* Botón secundario con fondo de vidrio (outline-glass) */
    .btn-outline-glass {
        background: rgba(255, 255, 255, .05);
        border: 1px solid rgba(255, 255, 255, .12);
        color: white;
        border-radius: 40px;
        padding: 14px 28px;
        backdrop-filter: blur(10px);
    }

    .btn-outline-glass:hover {
        background: rgba(255, 255, 255, .12);
        color: white;
    }

    /* ================================================
       RATING CON EMOJIS
    ================================================ */

    .rating { font-size: 18px; }

    /* ================================================
       SECCIÓN EXTRA — Cocina con pasión
    ================================================ */

    .extra-section {
        padding: 70px 40px;
        border-radius: 35px;
        background: rgba(255, 255, 255, .05);
        border: 1px solid rgba(255, 255, 255, .08);
        backdrop-filter: blur(16px);
    }

    /* Imagen de chef con borde redondeado y sombra rosada */
    .extra-img {
        border-radius: 30px;
        box-shadow: 0 0 35px rgba(236, 72, 153, .25);
    }

    /* ================================================
       CAJA DE CRÉDITOS
    ================================================ */

    .creator-box {
        padding: 40px;
        border-radius: 30px;
        background: rgba(255, 255, 255, .05);
        border: 1px solid rgba(255, 255, 255, .08);
        backdrop-filter: blur(12px);
    }

    /* ================================================
       RESPONSIVE: ajustes para pantallas < 768px
    ================================================ */

    @media (max-width: 768px) {
        .menu-hero     { padding: 70px 20px; }
        .menu-hero h1  { font-size: 42px; }
        .card-title    { font-size: 24px; }
    }

</style>

@endsection