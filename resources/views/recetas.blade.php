```php id="q7m4zx"
@extends('layouts.app')

@section('title', 'Recetas')

@section('content')

<div class="container py-5">

    <!-- HEADER -->

    <div class="hero-recetas text-center mb-5">

        <span class="badge-recetas">
            🔥 Comunidad gastronómica
        </span>

        <h1 class="display-3 fw-bold mt-4">
            🍽️ Recetas de la
            <span class="text-gradient">
                Comunidad
            </span>
        </h1>

        <p class="lead mt-4">
            Descubre recetas increíbles, comparte sabores únicos
            y conecta con amantes de la cocina.
        </p>

        <div class="mt-5">

            <a href="{{ route('recetas.crear') }}"
               class="btn btn-receta btn-lg px-5">
                ➕ Agregar Nueva Receta
            </a>

        </div>

    </div>

    <!-- ALERTA -->

    @if(session('success'))

    <div class="alert custom-alert text-center mb-5">

        <i class="bi bi-check-circle-fill"></i>

        {{ session('success') }}

    </div>

    @endif

    <!-- GRID RECETAS -->

    <div class="row g-4">

        @forelse($recetas as $receta)

        <div class="col-md-6 col-lg-4">

            <div class="card receta-card h-100">

                <!-- IMAGEN -->

                <div class="image-container">

                    @if($receta->imagen)

                    <img
                        src="{{ asset('storage/'.$receta->imagen) }}"
                        class="card-img-top"
                        alt="{{ $receta->nombre }}">

                    @else

                    <img
                        src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=1974&auto=format&fit=crop"
                        class="card-img-top"
                        alt="Sin imagen">

                    @endif

                    <!-- OVERLAY -->

                    <div class="overlay-gradient"></div>

                    <!-- BADGE -->

                    <div class="categoria-badge">
                        {{ $receta->categoria }}
                    </div>

                </div>

                <!-- BODY -->

                <div class="card-body d-flex flex-column">

                    <h3 class="fw-bold mb-3 receta-title">
                        {{ $receta->nombre }}
                    </h3>

                    <p class="autor mb-4">
                        <i class="bi bi-person-circle"></i>
                        {{ $receta->autor }}
                    </p>

                    <!-- INFO -->

                    <div class="d-flex justify-content-between mb-4">

                        <div class="info-chip">

                            <i class="bi bi-clock"></i>

                            {{ $receta->tiempo }} min

                        </div>

                        <div class="info-chip
                            @if($receta->dificultad=='Fácil') chip-success
                            @elseif($receta->dificultad=='Media') chip-warning
                            @else chip-danger
                            @endif">

                            {{ $receta->dificultad }}

                        </div>

                    </div>

                    <!-- BOTONES -->

                    <div class="mt-auto">

                        <div class="d-flex justify-content-center gap-2 flex-wrap">

                            <a href="#"
                               class="btn btn-glass">
                                👀 Ver
                            </a>

                            <a href="#"
                               class="btn btn-glass-primary">
                                ✏ Editar
                            </a>

                            <a href="#"
                               class="btn btn-glass-danger">
                                🗑 Eliminar
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        @empty

        <!-- VACÍO -->

        <div class="col-12">

            <div class="empty-state text-center">

                <div class="empty-icon">
                    🍽️
                </div>

                <h2 class="fw-bold mt-4">
                    Aún no hay recetas
                </h2>

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

    </div>

</div>

<!-- ESTILOS -->

<style>

/* HERO */

.hero-recetas{

padding:70px 30px;

border-radius:35px;

background:
linear-gradient(
135deg,
rgba(139,92,246,.20),
rgba(236,72,153,.16),
rgba(34,211,238,.10)
);

border:1px solid rgba(255,255,255,.08);

backdrop-filter:blur(20px);

box-shadow:
0 0 40px rgba(139,92,246,.20);

position:relative;

overflow:hidden;

}

.hero-recetas::before{

content:"";

position:absolute;

width:500px;
height:500px;

background:
radial-gradient(circle,
rgba(255,255,255,.12),
transparent 70%);

top:-250px;
right:-200px;

}

/* BADGE */

.badge-recetas{

display:inline-block;

padding:10px 18px;

border-radius:40px;

background:rgba(255,255,255,.08);

border:1px solid rgba(255,255,255,.10);

font-size:14px;

color:#e2e8f0;

backdrop-filter:blur(10px);

}

/* TEXT */

.text-gradient{

background:
linear-gradient(
90deg,
#c084fc,
#f472b6,
#22d3ee
);

-webkit-background-clip:text;
-webkit-text-fill-color:transparent;

}

/* ALERT */

.custom-alert{

background:
rgba(34,197,94,.15);

border:
1px solid rgba(34,197,94,.25);

padding:18px;

border-radius:20px;

color:#d1fae5;

backdrop-filter:blur(12px);

}

/* CARD */

.receta-card{

background:
rgba(255,255,255,.05);

border:
1px solid rgba(255,255,255,.08);

backdrop-filter:blur(16px);

border-radius:30px;

overflow:hidden;

transition:.45s;

position:relative;

}

.receta-card:hover{

transform:
translateY(-12px)
scale(1.02);

box-shadow:
0 15px 40px rgba(0,0,0,.35),
0 0 35px rgba(236,72,153,.20);

}

/* IMAGE */

.image-container{

position:relative;

overflow:hidden;

height:260px;

}

.card-img-top{

width:100%;
height:100%;
object-fit:cover;

transition:.6s;

}

.receta-card:hover .card-img-top{

transform:scale(1.08);

}

/* OVERLAY */

.overlay-gradient{

position:absolute;
inset:0;

background:
linear-gradient(
to top,
rgba(0,0,0,.65),
transparent
);

}

/* BADGE CATEGORÍA */

.categoria-badge{

position:absolute;

top:18px;
left:18px;

padding:8px 15px;

border-radius:30px;

background:
linear-gradient(
135deg,
#8b5cf6,
#ec4899
);

font-size:13px;

font-weight:600;

color:white;

box-shadow:
0 0 20px rgba(236,72,153,.35);

}

/* BODY */

.card-body{

padding:25px;

}

.receta-title{

color:white;

font-size:28px;

}

.autor{

color:#cbd5e1;

font-size:15px;

}

/* CHIPS */

.info-chip{

padding:10px 16px;

border-radius:20px;

background:
rgba(255,255,255,.06);

font-size:14px;

font-weight:600;

color:white;

border:
1px solid rgba(255,255,255,.08);

}

.chip-success{

background:
rgba(34,197,94,.15);

color:#bbf7d0;

}

.chip-warning{

background:
rgba(251,191,36,.15);

color:#fde68a;

}

.chip-danger{

background:
rgba(239,68,68,.15);

color:#fecaca;

}

/* BOTONES */

.btn-glass,
.btn-glass-primary,
.btn-glass-danger{

border-radius:30px;

padding:10px 18px;

font-weight:600;

transition:.3s;

border:none;

}

.btn-glass{

background:
rgba(255,255,255,.08);

color:white;

}

.btn-glass:hover{

background:
rgba(255,255,255,.15);

color:white;

}

.btn-glass-primary{

background:
rgba(59,130,246,.18);

color:#bfdbfe;

}

.btn-glass-primary:hover{

background:
rgba(59,130,246,.30);

color:white;

}

.btn-glass-danger{

background:
rgba(239,68,68,.18);

color:#fecaca;

}

.btn-glass-danger:hover{

background:
rgba(239,68,68,.30);

color:white;

}

/* EMPTY */

.empty-state{

padding:80px 20px;

border-radius:35px;

background:
rgba(255,255,255,.05);

border:
1px solid rgba(255,255,255,.08);

backdrop-filter:blur(16px);

}

.empty-icon{

font-size:90px;

filter:
drop-shadow(0 0 20px rgba(236,72,153,.35));

}

</style>

@endsection
```
