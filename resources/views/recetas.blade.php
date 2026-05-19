{{-- ============================================================
     Vista: recetas.blade.php (menu/index)
     Descripción: Listado de recetas de la comunidad ASHDAY.
     Muestra un grid de tarjetas con imagen, categoría, autor,
     tiempo, dificultad y botones de acción.
     Extiende: layouts.app
     Variable esperada: $recetas (Collection de modelo Receta)
     ============================================================ --}}

@extends('layouts.app')

{{-- Título de la pestaña --}}
@section('title', 'Recetas')

@section('content')

<div class="container py-5">

    {{-- ======================================================
         HERO / CABECERA
         Presentación de la sección con gradiente glassmorphism
         y botón para crear una nueva receta.
         ====================================================== --}}
    <div class="hero-recetas text-center mb-5">

        <span class="badge-recetas">🔥 Comunidad gastronómica</span>

        <h1 class="display-3 fw-bold mt-4">
            🍽️ Recetas de la
            <span class="text-gradient">Comunidad</span>
        </h1>

        <p class="lead mt-4">
            Descubre recetas increíbles, comparte sabores únicos
            y conecta con amantes de la cocina.
        </p>

        <div class="mt-5">
            <a href="{{ route('recetas.crear') }}" class="btn btn-receta btn-lg px-5">
                ➕ Agregar Nueva Receta
            </a>
        </div>

    </div>

    {{-- ======================================================
         ALERTA DE ÉXITO
         Aparece cuando se guarda/elimina una receta correctamente.
         Usa sesión flash 'success' generada desde el controlador.
         ====================================================== --}}
    @if(session('success'))
        <div class="alert custom-alert text-center mb-5" role="alert">
            <i class="bi bi-check-circle-fill me-2" aria-hidden="true"></i>
            {{ session('success') }}
        </div>
    @endif

    {{-- ======================================================
         GRID DE RECETAS
         @forelse itera sobre $recetas; si está vacía muestra
         el estado vacío en lugar de un grid sin contenido.
         ====================================================== --}}
    <div class="row g-4">

        @forelse($recetas as $receta)

            {{-- Columna responsive: 1 col móvil, 2 tablet, 3 escritorio --}}
            <div class="col-md-6 col-lg-4">

                <div class="card receta-card h-100">

                    {{-- --------------------------------------------------
                         CONTENEDOR DE IMAGEN
                         Muestra la imagen subida por el usuario o una
                         imagen de Unsplash como fallback genérico.
                         MEJORA: se añade loading="lazy" para rendimiento.
                         -------------------------------------------------- --}}
                    <div class="image-container">

                        @if($receta->imagen)
                            <img
                                src="{{ asset('storage/' . $receta->imagen) }}"
                                class="card-img-top"
                                alt="Foto de {{ $receta->nombre }}"
                                loading="lazy"
                            >
                        @else
                            <img
                                src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=1974&auto=format&fit=crop"
                                class="card-img-top"
                                alt="Imagen de receta genérica"
                                loading="lazy"
                            >
                        @endif

                        {{-- Degradado oscuro inferior para mejorar legibilidad del badge --}}
                        <div class="overlay-gradient" aria-hidden="true"></div>

                        {{-- Badge con la categoría de la receta --}}
                        <div class="categoria-badge">
                            {{ $receta->categoria }}
                        </div>

                    </div>

                    {{-- --------------------------------------------------
                         CUERPO DE LA TARJETA
                         Muestra nombre, autor, chips de info y botones.
                         -------------------------------------------------- --}}
                    <div class="card-body d-flex flex-column">

                        {{-- Nombre de la receta --}}
                        <h3 class="fw-bold mb-3 receta-title">
                            {{ $receta->nombre }}
                        </h3>

                        {{-- Autor con icono Bootstrap Icons --}}
                        <p class="autor mb-4">
                            <i class="bi bi-person-circle me-1" aria-hidden="true"></i>
                            {{ $receta->autor }}
                        </p>

                        {{-- Chips de tiempo y dificultad --}}
                        <div class="d-flex justify-content-between mb-4">

                            {{-- Chip: tiempo de preparación en minutos --}}
                            <div class="info-chip">
                                <i class="bi bi-clock me-1" aria-hidden="true"></i>
                                {{ $receta->tiempo }} min
                            </div>

                            {{-- Chip: nivel de dificultad con color semántico --}}
                            <div class="info-chip
                                @if($receta->dificultad === 'Fácil')  chip-success
                                @elseif($receta->dificultad === 'Media') chip-warning
                                @else chip-danger
                                @endif
                            ">
                                {{ $receta->dificultad }}
                            </div>

                        </div>

                        {{-- --------------------------------------------------
                             BOTONES DE ACCIÓN
                             CORRECCIÓN: los href="#" se reemplazan por rutas
                             reales. El botón Eliminar usa un form con método
                             DELETE para cumplir con REST y protección CSRF.
                             -------------------------------------------------- --}}
                        <div class="mt-auto">
                            <div class="d-flex justify-content-center gap-2 flex-wrap">

                                {{-- Ver detalle de la receta --}}
                                <a href="{{ route('recetas.show', $receta) }}"
                                   class="btn btn-glass">
                                    👀 Ver
                                </a>

                                {{-- Editar receta --}}
                                <a href="{{ route('recetas.edit', $receta) }}"
                                   class="btn btn-glass-primary">
                                    ✏️ Editar
                                </a>

                                {{-- Eliminar receta — requiere confirmación y método DELETE --}}
                                <form
                                    action="{{ route('recetas.destroy', $receta) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('¿Eliminar esta receta?')"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-glass-danger">
                                        🗑 Eliminar
                                    </button>
                                </form>

                            </div>
                        </div>

                    </div>{{-- /card-body --}}

                </div>{{-- /receta-card --}}

            </div>{{-- /col --}}

        @empty

            {{-- ================================================
                 ESTADO VACÍO
                 Se muestra cuando $recetas no tiene elementos.
                 ================================================ --}}
            <div class="col-12">
                <div class="empty-state text-center">

                    <div class="empty-icon" aria-hidden="true">🍽️</div>

                    <h2 class="fw-bold mt-4">Aún no hay recetas</h2>

                    <p class="opacity-75">
                        Sé el primero en compartir una receta increíble.
                    </p>

                    <a href="{{ route('recetas.crear') }}"
                       class="btn btn-receta mt-3 px-5">
                        ➕ Crear receta
                    </a>

                </div>
            </div>

        @endforelse

    </div>{{-- /row --}}

    {{-- MEJORA: paginación si el controlador usa paginate() --}}
    @if($recetas instanceof \Illuminate\Pagination\LengthAwarePaginator && $recetas->hasPages())
        <div class="d-flex justify-content-center mt-5">
            {{ $recetas->links() }}
        </div>
    @endif

</div>{{-- /container --}}

{{-- ============================================================
     ESTILOS DE LA VISTA
     Considera moverlos a resources/css o un archivo Vite/SASS
     en un proyecto de mayor escala.
     ============================================================ --}}
<style>

/* -------------------------------------------------------
   HERO
   Fondo glassmorphism con gradiente y luz decorativa
   generada con ::before para no añadir un div extra.
   ------------------------------------------------------- */
.hero-recetas {
    padding: 70px 30px;
    border-radius: 35px;
    background: linear-gradient(
        135deg,
        rgba(139, 92, 246, .20),
        rgba(236, 72, 153, .16),
        rgba(34, 211, 238, .10)
    );
    border: 1px solid rgba(255, 255, 255, .08);
    backdrop-filter: blur(20px);
    box-shadow: 0 0 40px rgba(139, 92, 246, .20);
    position: relative;
    overflow: hidden;
}

/* Luz radial decorativa en la esquina superior derecha */
.hero-recetas::before {
    content: "";
    position: absolute;
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, rgba(255, 255, 255, .12), transparent 70%);
    top: -250px;
    right: -200px;
    pointer-events: none; /* MEJORA: no interfiere con clics */
}

/* -------------------------------------------------------
   BADGE DE SECCIÓN
   ------------------------------------------------------- */
.badge-recetas {
    display: inline-block;
    padding: 10px 18px;
    border-radius: 40px;
    background: rgba(255, 255, 255, .08);
    border: 1px solid rgba(255, 255, 255, .10);
    font-size: 14px;
    color: #e2e8f0;
    backdrop-filter: blur(10px);
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

/* -------------------------------------------------------
   ALERTA DE ÉXITO
   ------------------------------------------------------- */
.custom-alert {
    background: rgba(34, 197, 94, .15);
    border: 1px solid rgba(34, 197, 94, .25);
    padding: 18px;
    border-radius: 20px;
    color: #d1fae5;
    backdrop-filter: blur(12px);
}

/* -------------------------------------------------------
   TARJETA DE RECETA
   Glassmorphism con efecto hover de elevación y escala.
   ------------------------------------------------------- */
.receta-card {
    background: rgba(255, 255, 255, .05);
    border: 1px solid rgba(255, 255, 255, .08);
    backdrop-filter: blur(16px);
    border-radius: 30px;
    overflow: hidden;
    transition: transform .45s ease, box-shadow .45s ease; /* MEJORA: propiedades explícitas */
    position: relative;
}

.receta-card:hover {
    transform: translateY(-12px) scale(1.02);
    box-shadow:
        0 15px 40px rgba(0, 0, 0, .35),
        0 0 35px rgba(236, 72, 153, .20);
}

/* -------------------------------------------------------
   CONTENEDOR DE IMAGEN
   Altura fija con object-fit cover y zoom en hover.
   ------------------------------------------------------- */
.image-container {
    position: relative;
    overflow: hidden;
    height: 260px;
}

.card-img-top {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .6s ease;
    display: block; /* MEJORA: elimina espacio inferior del inline por defecto */
}

/* Zoom de imagen al hacer hover en la tarjeta */
.receta-card:hover .card-img-top {
    transform: scale(1.08);
}

/* -------------------------------------------------------
   OVERLAY / DEGRADADO SOBRE IMAGEN
   Oscurece la parte inferior para mejorar legibilidad.
   ------------------------------------------------------- */
.overlay-gradient {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0, 0, 0, .65), transparent);
}

/* -------------------------------------------------------
   BADGE DE CATEGORÍA
   Etiqueta posicionada sobre la imagen (top-left).
   ------------------------------------------------------- */
.categoria-badge {
    position: absolute;
    top: 18px;
    left: 18px;
    padding: 8px 15px;
    border-radius: 30px;
    background: linear-gradient(135deg, #8b5cf6, #ec4899);
    font-size: 13px;
    font-weight: 600;
    color: white;
    box-shadow: 0 0 20px rgba(236, 72, 153, .35);
    z-index: 1; /* MEJORA: garantiza visibilidad sobre el overlay */
}

/* -------------------------------------------------------
   CUERPO DE LA TARJETA
   ------------------------------------------------------- */
.card-body { padding: 25px; }

.receta-title {
    color: white;
    font-size: 22px; /* MEJORA: reducido de 28px para evitar desbordamiento en móvil */
    line-height: 1.3;
}

.autor {
    color: #cbd5e1;
    font-size: 15px;
}

/* -------------------------------------------------------
   CHIPS DE INFORMACIÓN (tiempo / dificultad)
   ------------------------------------------------------- */
.info-chip {
    padding: 10px 16px;
    border-radius: 20px;
    background: rgba(255, 255, 255, .06);
    font-size: 14px;
    font-weight: 600;
    color: white;
    border: 1px solid rgba(255, 255, 255, .08);
}

/* Variante semántica: fácil */
.chip-success {
    background: rgba(34, 197, 94, .15);
    color: #bbf7d0;
}

/* Variante semántica: media */
.chip-warning {
    background: rgba(251, 191, 36, .15);
    color: #fde68a;
}

/* Variante semántica: difícil */
.chip-danger {
    background: rgba(239, 68, 68, .15);
    color: #fecaca;
}

/* -------------------------------------------------------
   BOTONES DE ACCIÓN DE TARJETA
   Tres variantes: neutral, primario (azul) y peligro (rojo).
   ------------------------------------------------------- */
.btn-glass,
.btn-glass-primary,
.btn-glass-danger {
    border-radius: 30px;
    padding: 10px 18px;
    font-weight: 600;
    transition: background .3s ease, color .3s ease;
    border: none;
    cursor: pointer;
}

/* Variante neutral */
.btn-glass         { background: rgba(255, 255, 255, .08); color: white; }
.btn-glass:hover   { background: rgba(255, 255, 255, .15); color: white; }

/* Variante primaria (editar) */
.btn-glass-primary       { background: rgba(59, 130, 246, .18); color: #bfdbfe; }
.btn-glass-primary:hover { background: rgba(59, 130, 246, .30); color: white; }

/* Variante peligro (eliminar) */
.btn-glass-danger       { background: rgba(239, 68, 68, .18); color: #fecaca; }
.btn-glass-danger:hover { background: rgba(239, 68, 68, .30); color: white; }

/* -------------------------------------------------------
   ESTADO VACÍO
   Se muestra cuando no hay recetas registradas.
   ------------------------------------------------------- */
.empty-state {
    padding: 80px 20px;
    border-radius: 35px;
    background: rgba(255, 255, 255, .05);
    border: 1px solid rgba(255, 255, 255, .08);
    backdrop-filter: blur(16px);
}

.empty-icon {
    font-size: 90px;
    filter: drop-shadow(0 0 20px rgba(236, 72, 153, .35));
}

/* -------------------------------------------------------
   BOTÓN PRINCIPAL (reutilizado del sistema de diseño)
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
    .hero-recetas        { padding: 50px 20px; }
    .hero-recetas h1     { font-size: 36px; }
    .image-container     { height: 200px; }
    .receta-title        { font-size: 18px; }
    .btn-glass,
    .btn-glass-primary,
    .btn-glass-danger    { padding: 8px 14px; font-size: 13px; }
}

</style>

@endsection