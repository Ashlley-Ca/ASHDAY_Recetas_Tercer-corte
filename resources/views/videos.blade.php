{{-- ============================================================
     Vista: videos.blade.php
     Descripción: Página de videos de recetas de ASHDAY Recetas.
     Muestra un hero, grid de 3 tarjetas con iframes de YouTube
     y una sección extra de características.
     Extiende: layouts.app
     ============================================================ --}}

@extends('layouts.app')

{{-- Título de la pestaña --}}
@section('title', 'Videos de Recetas')

@section('content')

<div class="container py-5">

    {{-- ======================================================
         HERO / CABECERA
         Presentación de la sección de videos con fondo
         glassmorphism y dos botones de navegación.
         ====================================================== --}}
    <section class="videos-hero text-center mb-5">

        {{-- Elemento decorativo de luz radial (aria-hidden: no aporta info) --}}
        <div class="hero-light" aria-hidden="true"></div>

        <span class="hero-badge">🎬 Contenido gastronómico</span>

        <h1 class="display-3 fw-bold mt-4">
            Videos de
            <span class="text-gradient">Recetas</span>
        </h1>

        <p class="hero-text mx-auto mt-4">
            Aprende a cocinar recetas deliciosas paso a paso
            con videos modernos, dinámicos y fáciles de seguir.
            Descubre nuevas ideas culinarias con
            <strong>ASHDAY Recetas</strong>.
        </p>

        {{-- Botones de acción: explorar recetas y crear nueva receta --}}
        <div class="mt-4 d-flex justify-content-center gap-3 flex-wrap">
            <a href="{{ route('menu') }}" class="btn btn-receta btn-lg">
                🍽️ Explorar recetas
            </a>
            <a href="{{ route('recetas.crear') }}" class="btn btn-glass btn-lg">
                ➕ Crear receta
            </a>
        </div>

    </section>

    {{-- ======================================================
         GRID DE VIDEOS
         MEJORA: los datos de cada video se centralizan en un
         array para facilitar el mantenimiento y evitar repetir
         el mismo bloque HTML tres veces.
         Si en el futuro los videos vienen de base de datos,
         solo hay que cambiar esta sección.
         ====================================================== --}}

    {{-- Array de videos: cada entrada define todos los datos de la tarjeta --}}
    @php
        $videos = [
            [
                'embed'       => 'https://www.youtube.com/embed/1APwq1df6Mw',
                'titulo'      => 'Panqueques Esponjosos',
                'badge_label' => '🔥 Popular',
                'badge_color' => '',           // vacío = color naranja/rojo por defecto
                'categoria'   => '🥞 Desayuno',
                'tiempo'      => '12 min',
                'descripcion' => 'Aprende a preparar panqueques suaves, dulces y perfectos para acompañar tus desayunos favoritos.',
                'estrellas'   => 5,
            ],
            [
                'embed'       => 'https://www.youtube.com/embed/foD42-73wdI',
                'titulo'      => 'Hamburguesa Gourmet',
                'badge_label' => '🍔 Trending',
                'badge_color' => 'pink',
                'categoria'   => '🍔 Gourmet',
                'tiempo'      => '18 min',
                'descripcion' => 'Descubre cómo preparar una hamburguesa casera jugosa, moderna y llena de sabor.',
                'estrellas'   => 5,
            ],
            [
                'embed'       => 'https://www.youtube.com/embed/3AAdKl1UYZs',
                'titulo'      => 'Ensalada Fresca',
                'badge_label' => '🥗 Healthy',
                'badge_color' => 'blue',
                'categoria'   => '🌱 Saludable',
                'tiempo'      => '10 min',
                'descripcion' => 'Una receta ligera y nutritiva ideal para disfrutar comidas saludables llenas de color y frescura.',
                'estrellas'   => 4,
            ],
        ];
    @endphp

    <div class="row g-4">

        @foreach($videos as $video)

            <div class="col-lg-4 col-md-6">

                <article class="video-card h-100">

                    {{-- --------------------------------------------------
                         CONTENEDOR DEL IFRAME
                         ratio-16x9 de Bootstrap garantiza aspecto correcto.
                         MEJORA: se añade loading="lazy" al iframe para no
                         cargar YouTube hasta que el usuario se aproxima.
                         -------------------------------------------------- --}}
                    <div class="video-container">

                        {{-- Badge de categoría/tendencia posicionado sobre el iframe --}}
                        <div class="video-badge {{ $video['badge_color'] }}" aria-label="{{ $video['badge_label'] }}">
                            {{ $video['badge_label'] }}
                        </div>

                        <div class="ratio ratio-16x9">
                            <iframe
                                src="{{ $video['embed'] }}"
                                title="{{ $video['titulo'] }}"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen
                                loading="lazy"
                            ></iframe>
                        </div>

                    </div>

                    {{-- Cuerpo de la tarjeta: categoría, tiempo, título, texto, rating --}}
                    <div class="card-body p-4">

                        {{-- Mini badges: categoría y tiempo --}}
                        <div class="d-flex justify-content-between mb-3">
                            <span class="mini-badge">{{ $video['categoria'] }}</span>
                            <span class="mini-badge purple">⏱️ {{ $video['tiempo'] }}</span>
                        </div>

                        {{-- Título de la receta --}}
                        <h3 class="video-title">{{ $video['titulo'] }}</h3>

                        {{-- Descripción breve --}}
                        <p class="video-text">{{ $video['descripcion'] }}</p>

                        {{-- Rating con estrellas generado dinámicamente --}}
                        <div class="d-flex justify-content-between align-items-center mt-4">

                            {{-- MEJORA: estrellas generadas desde el número, no texto fijo --}}
                            <div class="rating" aria-label="{{ $video['estrellas'] }} de 5 estrellas">
                                @for($i = 1; $i <= 5; $i++)
                                    {{ $i <= $video['estrellas'] ? '⭐' : '☆' }}
                                @endfor
                            </div>

                            {{-- CORRECCIÓN: el botón "Ver ahora" hace scroll al iframe o abre YouTube --}}
                            <a
                                href="{{ $video['embed'] }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="btn btn-video"
                                aria-label="Ver {{ $video['titulo'] }} en YouTube"
                            >
                                ▶ Ver ahora
                            </a>

                        </div>

                    </div>

                </article>

            </div>

        @endforeach

    </div>{{-- /row videos --}}

    {{-- ======================================================
         SECCIÓN EXTRA — Beneficios del contenido en video
         Columna de texto con lista de características y una
         imagen decorativa de chef.
         ====================================================== --}}
    <section class="extra-section mt-5" aria-labelledby="extra-titulo">

        <div class="row align-items-center g-5">

            {{-- Columna izquierda: texto y lista de características --}}
            <div class="col-lg-6">

                <span class="hero-badge">✨ Aprende cocinando</span>

                <h2 id="extra-titulo" class="fw-bold display-5 mt-4">
                    Cocina con videos
                    <span class="text-gradient">dinámicos</span>
                </h2>

                <p class="mt-4 fs-5 opacity-75">
                    Disfruta contenido visual moderno diseñado
                    para ayudarte a cocinar de forma fácil,
                    entretenida y creativa.
                </p>

                {{-- Lista de características --}}
                <div class="feature-list mt-4" aria-label="Características">
                    <div class="feature-item">🎥 Videos HD paso a paso</div>
                    <div class="feature-item">🍽️ Recetas modernas y creativas</div>
                    <div class="feature-item">🚀 Experiencia visual interactiva</div>
                </div>

            </div>

            {{-- Columna derecha: imagen decorativa de chef --}}
            <div class="col-lg-6 text-center">
                <img
                    src="https://images.unsplash.com/photo-1556910103-1c02745aae4d"
                    class="img-fluid chef-img"
                    alt="Chef preparando una receta"
                    loading="lazy"
                >
            </div>

        </div>

    </section>

</div>{{-- /container --}}

{{-- ============================================================
     ESTILOS DE LA VISTA
     Considera moverlos a un archivo CSS/SASS externo en un
     proyecto de mayor escala para separar responsabilidades.
     ============================================================ --}}
<style>

/* -------------------------------------------------------
   HERO
   Fondo glassmorphism con gradiente y luz decorativa.
   ------------------------------------------------------- */
.videos-hero {
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

/* Luz radial decorativa en la esquina superior derecha */
.hero-light {
    position: absolute;
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, rgba(255, 255, 255, .14), transparent 70%);
    top: -250px;
    right: -150px;
    pointer-events: none; /* no interfiere con clics */
}

/* -------------------------------------------------------
   TEXTO CON GRADIENTE
   ------------------------------------------------------- */
.text-gradient {
    background: linear-gradient(90deg, #c084fc, #f472b6, #22d3ee);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text; /* propiedad estándar */
}

.hero-text {
    max-width: 750px;
    font-size: 18px;
    line-height: 1.9;
    opacity: .85;
}

/* -------------------------------------------------------
   BADGE DE SECCIÓN
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
   TARJETA DE VIDEO
   Glassmorphism con efecto hover de elevación.
   ------------------------------------------------------- */
.video-card {
    background: rgba(255, 255, 255, .05);
    border: 1px solid rgba(255, 255, 255, .08);
    border-radius: 30px;
    overflow: hidden;
    backdrop-filter: blur(18px);
    transition: transform .4s ease, box-shadow .4s ease; /* propiedades explícitas */
    box-shadow: 0 8px 30px rgba(0, 0, 0, .25);
}

.video-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 0 35px rgba(236, 72, 153, .25);
}

/* -------------------------------------------------------
   CONTENEDOR DEL IFRAME
   Necesario para posicionar el badge sobre el video.
   ------------------------------------------------------- */
.video-container {
    position: relative;
    overflow: hidden;
}

/* Elimina el borde predeterminado del iframe */
iframe { border: none; }

/* -------------------------------------------------------
   BADGE SOBRE EL VIDEO (Popular / Trending / Healthy)
   Variantes de color controladas por clase adicional.
   ------------------------------------------------------- */
.video-badge {
    position: absolute;
    top: 18px;
    left: 18px;
    z-index: 2;
    padding: 10px 18px;
    border-radius: 30px;
    font-size: 14px;
    font-weight: 600;
    color: white;
    box-shadow: 0 0 20px rgba(239, 68, 68, .35);
    /* Color por defecto: naranja-rojo (Popular) */
    background: linear-gradient(135deg, #f59e0b, #ef4444);
}

/* Variante rosa (Trending) */
.video-badge.pink {
    background: linear-gradient(135deg, #ec4899, #f472b6);
}

/* Variante azul (Healthy) */
.video-badge.blue {
    background: linear-gradient(135deg, #06b6d4, #3b82f6);
}

/* -------------------------------------------------------
   MINI BADGES (categoría y tiempo)
   ------------------------------------------------------- */
.mini-badge {
    padding: 8px 14px;
    border-radius: 20px;
    background: rgba(255, 255, 255, .08);
    font-size: 13px;
}

/* Variante violeta para el chip de tiempo */
.mini-badge.purple {
    background: rgba(139, 92, 246, .18);
}

/* -------------------------------------------------------
   TEXTO DE LA TARJETA
   ------------------------------------------------------- */
.video-title {
    font-size: 22px; /* MEJORA: reducido de 28px para móvil */
    font-weight: 700;
    margin-bottom: 15px;
    line-height: 1.3;
    color: white;
}

.video-text {
    line-height: 1.7;
    opacity: .82;
}

/* -------------------------------------------------------
   RATING DE ESTRELLAS
   ------------------------------------------------------- */
.rating { font-size: 18px; }

/* -------------------------------------------------------
   BOTONES
   ------------------------------------------------------- */

/* Botón principal con gradiente (hero y tarjetas) */
.btn-receta,
.btn-video {
    background: linear-gradient(135deg, #8b5cf6, #ec4899);
    border: none;
    color: white;
    font-weight: 600;
    border-radius: 40px;
    transition: transform .3s ease, box-shadow .3s ease;
    box-shadow: 0 0 25px rgba(236, 72, 153, .30);
    text-decoration: none; /* MEJORA: elimina subrayado en <a> estilizados como botón */
    display: inline-block;
}

.btn-receta { padding: 14px 28px; }
.btn-video  { padding: 10px 18px; }

.btn-receta:hover,
.btn-video:hover {
    transform: translateY(-3px) scale(1.04);
    color: white;
    box-shadow: 0 0 30px rgba(236, 72, 153, .45);
}

/* Botón glass neutro */
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
   SECCIÓN EXTRA (beneficios del contenido en video)
   ------------------------------------------------------- */
.extra-section {
    margin-top: 70px;
    padding: 70px 40px;
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

/* Imagen del chef con borde redondeado y sombra rosa */
.chef-img {
    border-radius: 30px;
    box-shadow: 0 0 35px rgba(236, 72, 153, .25);
}

/* -------------------------------------------------------
   RESPONSIVE — pantallas menores a 768px
   ------------------------------------------------------- */
@media (max-width: 768px) {
    .videos-hero      { padding: 70px 20px; }
    .videos-hero h1   { font-size: 42px; }
    .video-title      { font-size: 20px; }
    .extra-section    { padding: 40px 20px; }
    .btn-receta,
    .btn-glass        { padding: 12px 22px; }
}

</style>

@endsection