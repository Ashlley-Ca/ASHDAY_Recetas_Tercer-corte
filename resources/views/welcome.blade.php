{{-- ============================================================
     Vista: inicio.blade.php (welcome / home)
     Descripción: Página de inicio de ASHDAY Recetas.
     Secciones: hero principal, categorías, beneficios y CTA final.
     Extiende: layouts.app
     Directivas de auth: muestra botones distintos a usuarios
     autenticados (@auth) vs invitados (@guest).
     ============================================================ --}}

@extends('layouts.app')

{{-- Título de la pestaña del navegador --}}
@section('title', 'Inicio')

@section('content')

{{-- ======================================================
     SECCIÓN HERO PRINCIPAL
     Presentación de la plataforma con título, descripción
     y botones de acción diferenciados por estado de sesión.
     ====================================================== --}}
<section class="hero text-center" aria-labelledby="hero-titulo">

    <div class="container">

        <h1 id="hero-titulo" class="display-3 fw-bold mb-4">
            🍽️ Recetario Comunitario
        </h1>

        <p class="lead mb-5">
            Comparte, descubre y disfruta recetas creadas por la comunidad.
            Explora sabores únicos y dale vida a tu creatividad culinaria.
        </p>

        <div class="d-flex justify-content-center gap-3 flex-wrap">

            {{-- Botón siempre visible: ir al listado de recetas --}}
            <a href="{{ route('recetas') }}" class="btn btn-receta btn-lg px-5">
                🍴 Ver Recetas
            </a>

            {{-- Si el usuario está autenticado, mostrar botón de crear receta --}}
            @auth
                <a href="{{ route('recetas.crear') }}"
                   class="btn btn-outline-light btn-lg rounded-pill px-5">
                    ➕ Agregar Receta
                </a>
            @endauth

            {{-- Si el usuario es invitado, invitarlo a registrarse --}}
            @guest
                <a href="{{ route('register') }}"
                   class="btn btn-outline-light btn-lg rounded-pill px-5">
                    ✨ Únete Ahora
                </a>
            @endguest

        </div>

    </div>

</section>

{{-- ======================================================
     SECCIÓN CATEGORÍAS
     Grid de 4 tarjetas: Desayunos, Almuerzos, Cenas, Postres.
     MEJORA: datos centralizados en un array @php para evitar
     repetir el bloque de tarjeta cuatro veces.
     ====================================================== --}}
<section class="py-5" aria-labelledby="categorias-titulo">

    <div class="container">

        <div class="text-center mb-5">
            <h2 id="categorias-titulo" class="fw-bold display-5">
                🔥 Explora Categorías
            </h2>
            <p class="text-light opacity-75">
                Encuentra recetas para cualquier momento del día.
            </p>
        </div>

        {{-- Array de categorías: emoji, nombre y descripción breve --}}
        @php
            $categorias = [
                ['emoji' => '🥐', 'nombre' => 'Desayunos',  'desc' => 'Empieza el día con energía y sabor.'],
                ['emoji' => '🍛', 'nombre' => 'Almuerzos',  'desc' => 'Recetas perfectas para compartir.'],
                ['emoji' => '🍲', 'nombre' => 'Cenas',      'desc' => 'Platos deliciosos para cerrar el día.'],
                ['emoji' => '🍰', 'nombre' => 'Postres',    'desc' => 'El toque dulce perfecto para todos.'],
            ];
        @endphp

        <div class="row g-4">

            @foreach($categorias as $cat)

                <div class="col-md-3 col-6">{{-- MEJORA: col-6 en móvil para 2 columnas --}}

                    {{-- MEJORA: <article> es semánticamente correcto para una tarjeta de contenido --}}
                    <article class="card text-center h-100">
                        <div class="card-body">

                            {{-- Emoji de la categoría como elemento visual decorativo --}}
                            <div class="display-3 mb-3" aria-hidden="true">
                                {{ $cat['emoji'] }}
                            </div>

                            <h4 class="fw-bold">{{ $cat['nombre'] }}</h4>

                            <p class="opacity-75">{{ $cat['desc'] }}</p>

                        </div>
                    </article>

                </div>

            @endforeach

        </div>

    </div>

</section>

{{-- ======================================================
     SECCIÓN BENEFICIOS
     Tres pilares de valor: Comparte, Aprende, Conecta.
     MEJORA: igual que categorías, se usa un array para no
     duplicar HTML innecesariamente.
     ====================================================== --}}
<section class="py-5" aria-labelledby="beneficios-titulo">

    <div class="container">

        <div class="card p-5">

            <div class="text-center mb-5">
                <h2 id="beneficios-titulo" class="display-5 fw-bold">
                    ✨ ¿Por qué usar ASHDAY Recetas?
                </h2>
                <p class="opacity-75">
                    Una experiencia moderna para amantes de la cocina.
                </p>
            </div>

            {{-- Array de beneficios: emoji, título y descripción --}}
            @php
                $beneficios = [
                    ['emoji' => '👨‍🍳', 'titulo' => 'Comparte', 'desc' => 'Publica tus mejores recetas y sorprende a todos.'],
                    ['emoji' => '📖',   'titulo' => 'Aprende',  'desc' => 'Descubre nuevas preparaciones y técnicas.'],
                    ['emoji' => '❤️',   'titulo' => 'Conecta',  'desc' => 'Forma parte de una comunidad gastronómica.'],
                ];
            @endphp

            <div class="row text-center g-4">

                @foreach($beneficios as $item)

                    <div class="col-md-4">
                        <div class="display-2" aria-hidden="true">{{ $item['emoji'] }}</div>
                        <h4 class="fw-bold mt-3">{{ $item['titulo'] }}</h4>
                        <p class="opacity-75">{{ $item['desc'] }}</p>
                    </div>

                @endforeach

            </div>

        </div>

    </div>

</section>

{{-- ======================================================
     SECCIÓN CTA FINAL (Llamado a la acción)
     Invita al usuario a crear una receta (auth) o registrarse
     (guest). CORRECCIÓN: se cambia <div class="hero"> por
     <div class="cta-box"> para no reutilizar la clase hero
     del encabezado principal con otro significado.
     ====================================================== --}}
<section class="py-5 text-center" aria-labelledby="cta-titulo">

    <div class="container">

        <div class="cta-box">

            <h2 id="cta-titulo" class="display-5 fw-bold mb-4">
                🚀 ¿Listo para compartir tu receta?
            </h2>

            <p class="mb-4">
                Haz parte de ASHDAY Recetas y comparte tus mejores platos.
            </p>

            {{-- Botón de acción según estado de sesión --}}
            @auth
                <a href="{{ route('recetas.crear') }}" class="btn btn-receta btn-lg px-5">
                    ➕ Crear Receta
                </a>
            @endauth

            @guest
                <a href="{{ route('register') }}" class="btn btn-receta btn-lg px-5">
                    ✨ Crear Cuenta
                </a>
            @endguest

        </div>

    </div>

</section>

{{-- ============================================================
     ESTILOS ADICIONALES DE LA VISTA
     Solo se definen aquí las clases específicas de esta página
     que no estén ya en el layout principal (layouts.app).
     Para producción, considera moverlos a resources/css.
     ============================================================ --}}
<style>

/* -------------------------------------------------------
   HERO PRINCIPAL
   Fondo glassmorphism con gradiente y luz decorativa.
   Se asume que .hero puede estar parcialmente definido
   en el layout; estos estilos lo complementan o sobreescriben.
   ------------------------------------------------------- */
.hero {
    padding: 120px 20px;
    background: linear-gradient(
        135deg,
        rgba(139, 92, 246, .22),
        rgba(236, 72, 153, .18),
        rgba(6, 182, 212, .12)
    );
    border-radius: 35px;
    border: 1px solid rgba(255, 255, 255, .08);
    backdrop-filter: blur(18px);
    box-shadow: 0 0 40px rgba(139, 92, 246, .20);
    margin-bottom: 2rem;
    position: relative;
    overflow: hidden;
}

/* Luz decorativa en el hero */
.hero::before {
    content: "";
    position: absolute;
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, rgba(255,255,255,.12), transparent 70%);
    top: -250px;
    right: -200px;
    pointer-events: none;
}

/* -------------------------------------------------------
   CTA FINAL
   Mismo estilo glassmorphism que el hero pero con clase
   propia para no causar conflictos semánticos.
   ------------------------------------------------------- */
.cta-box {
    padding: 80px 40px;
    background: linear-gradient(
        135deg,
        rgba(139, 92, 246, .18),
        rgba(236, 72, 153, .14)
    );
    border-radius: 35px;
    border: 1px solid rgba(255, 255, 255, .08);
    backdrop-filter: blur(18px);
    box-shadow: 0 0 35px rgba(139, 92, 246, .18);
}

/* -------------------------------------------------------
   TARJETAS DE CATEGORÍAS Y BENEFICIOS
   Glassmorphism coherente con el resto del sistema de diseño.
   ------------------------------------------------------- */
.card {
    background: rgba(255, 255, 255, .05);
    border: 1px solid rgba(255, 255, 255, .08);
    backdrop-filter: blur(15px);
    border-radius: 28px;
    color: white;
    transition: transform .35s ease, box-shadow .35s ease;
}

.card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 0 30px rgba(236, 72, 153, .22);
}

/* -------------------------------------------------------
   BOTÓN PRINCIPAL (gradiente violeta-rosa)
   ------------------------------------------------------- */
.btn-receta {
    background: linear-gradient(135deg, #8b5cf6, #ec4899);
    border: none;
    color: white;
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

/* -------------------------------------------------------
   RESPONSIVE — pantallas menores a 768px
   ------------------------------------------------------- */
@media (max-width: 768px) {
    .hero            { padding: 80px 20px; }
    .hero h1         { font-size: 38px; }
    .cta-box         { padding: 50px 20px; }
    .cta-box h2      { font-size: 28px; }
}

</style>

@endsection