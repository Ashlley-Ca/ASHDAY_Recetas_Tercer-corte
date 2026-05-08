@extends('layouts.app')

@section('title','Videos de Recetas')

@section('content')

<div class="container py-5">

    <!-- HERO -->

    <section class="videos-hero text-center mb-5">

        <div class="hero-light"></div>

        <span class="hero-badge">
            🎬 Contenido gastronómico
        </span>

        <h1 class="display-3 fw-bold mt-4">

            Videos de
            <span class="text-gradient">
                Recetas
            </span>

        </h1>

        <p class="hero-text mx-auto mt-4">

            Aprende a cocinar recetas deliciosas paso a paso
            con videos modernos, dinámicos y fáciles de seguir.
            Descubre nuevas ideas culinarias con
            <strong>ASHDAY Recetas</strong>.

        </p>

        <div class="mt-4 d-flex justify-content-center gap-3 flex-wrap">

            <a href="{{ route('menu') }}"
               class="btn btn-receta btn-lg">

                🍽️ Explorar recetas

            </a>

            <a href="{{ route('recetas.crear') }}"
               class="btn btn-glass btn-lg">

                ➕ Crear receta

            </a>

        </div>

    </section>

    <!-- VIDEOS -->

    <div class="row g-4">

        <!-- VIDEO 1 -->

        <div class="col-lg-4 col-md-6">

            <div class="video-card h-100">

                <div class="video-container">

                    <div class="video-badge">
                        🔥 Popular
                    </div>

                    <div class="ratio ratio-16x9">

                        <iframe
                        src="https://www.youtube.com/embed/1APwq1df6Mw"
                        title="Panqueques Esponjosos"
                        allowfullscreen>
                        </iframe>

                    </div>

                </div>

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between mb-3">

                        <span class="mini-badge">
                            🥞 Desayuno
                        </span>

                        <span class="mini-badge purple">
                            ⏱️ 12 min
                        </span>

                    </div>

                    <h3 class="video-title">

                        Panqueques Esponjosos

                    </h3>

                    <p class="video-text">

                        Aprende a preparar panqueques suaves,
                        dulces y perfectos para acompañar
                        tus desayunos favoritos.

                    </p>

                    <div class="d-flex justify-content-between align-items-center mt-4">

                        <div class="rating">
                            ⭐⭐⭐⭐⭐
                        </div>

                        <button class="btn btn-video">

                            ▶ Ver ahora

                        </button>

                    </div>

                </div>

            </div>

        </div>

        <!-- VIDEO 2 -->

        <div class="col-lg-4 col-md-6">

            <div class="video-card h-100">

                <div class="video-container">

                    <div class="video-badge pink">
                        🍔 Trending
                    </div>

                    <div class="ratio ratio-16x9">

                        <iframe
                        src="https://www.youtube.com/embed/foD42-73wdI"
                        title="Hamburguesa Gourmet"
                        allowfullscreen>
                        </iframe>

                    </div>

                </div>

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between mb-3">

                        <span class="mini-badge">
                            🍔 Gourmet
                        </span>

                        <span class="mini-badge purple">
                            ⏱️ 18 min
                        </span>

                    </div>

                    <h3 class="video-title">

                        Hamburguesa Gourmet

                    </h3>

                    <p class="video-text">

                        Descubre cómo preparar una hamburguesa
                        casera jugosa, moderna y llena de sabor.

                    </p>

                    <div class="d-flex justify-content-between align-items-center mt-4">

                        <div class="rating">
                            ⭐⭐⭐⭐⭐
                        </div>

                        <button class="btn btn-video">

                            ▶ Ver ahora

                        </button>

                    </div>

                </div>

            </div>

        </div>

        <!-- VIDEO 3 -->

        <div class="col-lg-4 col-md-6">

            <div class="video-card h-100">

                <div class="video-container">

                    <div class="video-badge blue">
                        🥗 Healthy
                    </div>

                    <div class="ratio ratio-16x9">

                        <iframe
                        src="https://www.youtube.com/embed/3AAdKl1UYZs"
                        title="Ensalada Fresca"
                        allowfullscreen>
                        </iframe>

                    </div>

                </div>

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between mb-3">

                        <span class="mini-badge">
                            🌱 Saludable
                        </span>

                        <span class="mini-badge purple">
                            ⏱️ 10 min
                        </span>

                    </div>

                    <h3 class="video-title">

                        Ensalada Fresca

                    </h3>

                    <p class="video-text">

                        Una receta ligera y nutritiva ideal
                        para disfrutar comidas saludables
                        llenas de color y frescura.

                    </p>

                    <div class="d-flex justify-content-between align-items-center mt-4">

                        <div class="rating">
                            ⭐⭐⭐⭐☆
                        </div>

                        <button class="btn btn-video">

                            ▶ Ver ahora

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- EXTRA -->

    <section class="extra-section mt-5">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">

                <span class="hero-badge">
                    ✨ Aprende cocinando
                </span>

                <h2 class="fw-bold display-5 mt-4">

                    Cocina con videos
                    <span class="text-gradient">
                        dinámicos
                    </span>

                </h2>

                <p class="mt-4 fs-5 opacity-75">

                    Disfruta contenido visual moderno diseñado
                    para ayudarte a cocinar de forma fácil,
                    entretenida y creativa.

                </p>

                <div class="feature-list mt-4">

                    <div class="feature-item">
                        🎥 Videos HD paso a paso
                    </div>

                    <div class="feature-item">
                        🍽️ Recetas modernas y creativas
                    </div>

                    <div class="feature-item">
                        🚀 Experiencia visual interactiva
                    </div>

                </div>

            </div>

            <div class="col-lg-6 text-center">

                <img
                src="https://images.unsplash.com/photo-1556910103-1c02745aae4d"
                class="img-fluid chef-img"
                alt="Chef">

            </div>

        </div>

    </section>

</div>

<!-- ESTILOS -->

<style>

/* HERO */

.videos-hero{

position:relative;

padding:100px 35px;

border-radius:35px;

overflow:hidden;

background:
linear-gradient(
135deg,
rgba(139,92,246,.20),
rgba(236,72,153,.16),
rgba(6,182,212,.14)
);

border:
1px solid rgba(255,255,255,.08);

backdrop-filter:blur(18px);

box-shadow:
0 0 40px rgba(139,92,246,.25);

}

.hero-light{

position:absolute;

width:500px;
height:500px;

background:
radial-gradient(circle,
rgba(255,255,255,.14),
transparent 70%);

top:-250px;
right:-150px;

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

.hero-text{

max-width:750px;

font-size:18px;

line-height:1.9;

opacity:.85;

}

/* BADGES */

.hero-badge{

display:inline-block;

padding:10px 18px;

border-radius:30px;

background:
rgba(255,255,255,.08);

border:
1px solid rgba(255,255,255,.08);

backdrop-filter:blur(12px);

}

/* VIDEO CARDS */

.video-card{

background:
rgba(255,255,255,.05);

border:
1px solid rgba(255,255,255,.08);

border-radius:30px;

overflow:hidden;

backdrop-filter:blur(18px);

transition:.4s ease;

box-shadow:
0 8px 30px rgba(0,0,0,.25);

}

.video-card:hover{

transform:
translateY(-10px)
scale(1.02);

box-shadow:
0 0 35px rgba(236,72,153,.25);

}

/* VIDEO */

.video-container{

position:relative;

overflow:hidden;

}

iframe{

border:none;

}

/* VIDEO BADGE */

.video-badge{

position:absolute;

top:18px;
left:18px;

z-index:2;

padding:10px 18px;

border-radius:30px;

font-size:14px;

font-weight:600;

background:
linear-gradient(
135deg,
#f59e0b,
#ef4444
);

color:white;

box-shadow:
0 0 20px rgba(239,68,68,.35);

}

.video-badge.pink{

background:
linear-gradient(
135deg,
#ec4899,
#f472b6
);

}

.video-badge.blue{

background:
linear-gradient(
135deg,
#06b6d4,
#3b82f6
);

}

/* BADGES */

.mini-badge{

padding:8px 14px;

border-radius:20px;

background:
rgba(255,255,255,.08);

font-size:13px;

}

.purple{

background:
rgba(139,92,246,.18);

}

/* TITLES */

.video-title{

font-size:28px;

font-weight:700;

margin-bottom:15px;

}

/* TEXT */

.video-text{

line-height:1.7;

opacity:.82;

}

/* BUTTONS */

.btn-receta,
.btn-video{

background:
linear-gradient(
135deg,
#8b5cf6,
#ec4899
);

border:none;

color:white;

font-weight:600;

border-radius:40px;

transition:.3s;

box-shadow:
0 0 25px rgba(236,72,153,.30);

}

.btn-receta{

padding:14px 28px;

}

.btn-video{

padding:10px 18px;

}

.btn-receta:hover,
.btn-video:hover{

transform:
translateY(-3px)
scale(1.04);

color:white;

box-shadow:
0 0 30px rgba(236,72,153,.45);

}

/* GLASS BUTTON */

.btn-glass{

background:
rgba(255,255,255,.05);

border:
1px solid rgba(255,255,255,.10);

color:white;

border-radius:40px;

padding:14px 28px;

backdrop-filter:blur(10px);

}

.btn-glass:hover{

background:
rgba(255,255,255,.10);

color:white;

}

/* RATING */

.rating{

font-size:18px;

}

/* EXTRA */

.extra-section{

margin-top:70px;

padding:70px 40px;

border-radius:35px;

background:
rgba(255,255,255,.05);

border:
1px solid rgba(255,255,255,.08);

backdrop-filter:blur(18px);

}

/* FEATURES */

.feature-item{

padding:14px 18px;

margin-bottom:12px;

border-radius:18px;

background:
rgba(255,255,255,.05);

border:
1px solid rgba(255,255,255,.06);

}

/* IMAGE */

.chef-img{

border-radius:30px;

box-shadow:
0 0 35px rgba(236,72,153,.25);

}

/* RESPONSIVE */

@media(max-width:768px){

.videos-hero{

padding:70px 20px;

}

.videos-hero h1{

font-size:42px;

}

.video-title{

font-size:24px;

}

.extra-section{

padding:40px 20px;

}

}

</style>

@endsection