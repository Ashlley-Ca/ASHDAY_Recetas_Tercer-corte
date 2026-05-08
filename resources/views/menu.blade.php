@extends('layouts.app')

@section('title', 'Menú')

@section('content')

<div class="container py-5">

    <!-- HERO -->

    <section class="menu-hero text-center mb-5">

        <div class="hero-glow"></div>

        <span class="hero-badge">
            🍴 Experiencias gastronómicas
        </span>

        <h1 class="display-3 fw-bold mt-4">

            Recetas
            <span class="text-gradient">
                Destacadas
            </span>

        </h1>

        <p class="hero-text mx-auto mt-4">

            Descubre sabores únicos preparados con creatividad,
            ingredientes frescos y el estilo moderno de
            <strong>ASHDAY Recetas</strong>.

        </p>

        <div class="mt-4 d-flex justify-content-center gap-3 flex-wrap">

            <a href="{{ route('recetas.crear') }}"
               class="btn btn-receta btn-lg">

                ➕ Crear receta

            </a>

            <a href="{{ route('contacto') }}"
               class="btn btn-outline-glass btn-lg">

                ✨ Contáctanos

            </a>

        </div>

    </section>

    <!-- RECETAS -->

    <div class="row g-4">

        <!-- RECETA 1 -->

        <div class="col-lg-4 col-md-6">

            <div class="card receta-card h-100">

                <div class="img-container">

                    <img
                    src="https://images.unsplash.com/photo-1551782450-a2132b4ba21d"
                    class="card-img-top"
                    alt="Hamburguesa">

                    <div class="img-overlay">

                        <span class="categoria-badge">
                            🔥 Popular
                        </span>

                    </div>

                </div>

                <div class="card-body">

                    <div class="d-flex justify-content-between mb-3">

                        <span class="mini-badge">
                            🍔 Comida rápida
                        </span>

                        <span class="mini-badge time">
                            ⏱️ 25 min
                        </span>

                    </div>

                    <h3 class="card-title">
                        Hamburguesa Artesanal
                    </h3>

                    <p class="card-text">

                        Una hamburguesa gourmet preparada con carne
                        jugosa, pan artesanal y una explosión de sabor
                        en cada mordida.

                    </p>

                    <div class="d-flex justify-content-between align-items-center mt-4">

                        <div class="rating">
                            ⭐⭐⭐⭐⭐
                        </div>

                        <button class="btn btn-receta-sm">

                            Ver receta

                        </button>

                    </div>

                </div>

            </div>

        </div>

        <!-- RECETA 2 -->

        <div class="col-lg-4 col-md-6">

            <div class="card receta-card h-100">

                <div class="img-container">

                    <img
                    src="https://images.unsplash.com/photo-1490474418585-ba9bad8fd0ea"
                    class="card-img-top"
                    alt="Panqueques">

                    <div class="img-overlay">

                        <span class="categoria-badge pink">
                            🍓 Dulce
                        </span>

                    </div>

                </div>

                <div class="card-body">

                    <div class="d-flex justify-content-between mb-3">

                        <span class="mini-badge">
                            🥞 Desayuno
                        </span>

                        <span class="mini-badge time">
                            ⏱️ 15 min
                        </span>

                    </div>

                    <h3 class="card-title">
                        Panqueques Dulces
                    </h3>

                    <p class="card-text">

                        Panqueques suaves acompañados de frutas,
                        miel y toppings irresistibles para empezar
                        el día con energía.

                    </p>

                    <div class="d-flex justify-content-between align-items-center mt-4">

                        <div class="rating">
                            ⭐⭐⭐⭐⭐
                        </div>

                        <button class="btn btn-receta-sm">

                            Ver receta

                        </button>

                    </div>

                </div>

            </div>

        </div>

        <!-- RECETA 3 -->

        <div class="col-lg-4 col-md-6">

            <div class="card receta-card h-100">

                <div class="img-container">

                    <img
                    src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c"
                    class="card-img-top"
                    alt="Ensalada">

                    <div class="img-overlay">

                        <span class="categoria-badge blue">
                            🥗 Saludable
                        </span>

                    </div>

                </div>

                <div class="card-body">

                    <div class="d-flex justify-content-between mb-3">

                        <span class="mini-badge">
                            🌱 Fitness
                        </span>

                        <span class="mini-badge time">
                            ⏱️ 10 min
                        </span>

                    </div>

                    <h3 class="card-title">
                        Ensalada Saludable
                    </h3>

                    <p class="card-text">

                        Vegetales frescos, proteínas ligeras y una
                        mezcla perfecta para disfrutar una comida
                        equilibrada y deliciosa.

                    </p>

                    <div class="d-flex justify-content-between align-items-center mt-4">

                        <div class="rating">
                            ⭐⭐⭐⭐☆
                        </div>

                        <button class="btn btn-receta-sm">

                            Ver receta

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- SECCIÓN EXTRA -->

    <section class="extra-section mt-5">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <h2 class="fw-bold mb-4">

                    ✨ Cocina con pasión y creatividad

                </h2>

                <p class="opacity-75 fs-5">

                    En ASHDAY Recetas creemos que cocinar es una
                    experiencia divertida, artística y llena de sabor.

                </p>

                <p class="opacity-75">

                    Comparte tus mejores platos, descubre nuevas
                    ideas y conecta con una comunidad apasionada
                    por la gastronomía.

                </p>

                <a href="{{ route('recetas.crear') }}"
                   class="btn btn-receta mt-3">

                    🚀 Empezar ahora

                </a>

            </div>

            <div class="col-lg-6 text-center">

                <img
                src="https://images.unsplash.com/photo-1515003197210-e0cd71810b5f"
                class="img-fluid extra-img"
                alt="Chef">

            </div>

        </div>

    </section>

    <!-- FOOTER INFO -->

    <div class="creator-box text-center mt-5">

        <h4 class="fw-bold mb-3">
            👩‍💻 Proyecto desarrollado por
        </h4>

        <p class="mb-1">
            <strong>Ashlley Alejandra Castro</strong>
        </p>

        <p class="mb-3">
            <strong>Dayana Liseth Cuaran</strong>
        </p>

        <span class="project-badge">
            🚀 Proyecto académico — ASHDAY Recetas
        </span>

    </div>

</div>

<!-- ESTILOS -->

<style>

/* HERO */

.menu-hero{

position:relative;

padding:90px 30px;

border-radius:35px;

overflow:hidden;

background:
linear-gradient(
135deg,
rgba(139,92,246,.22),
rgba(236,72,153,.16),
rgba(6,182,212,.14)
);

border:
1px solid rgba(255,255,255,.08);

backdrop-filter:blur(18px);

box-shadow:
0 0 35px rgba(139,92,246,.22);

}

.hero-glow{

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

/* BADGES */

.hero-badge,
.project-badge{

display:inline-block;

padding:10px 18px;

border-radius:30px;

background:
rgba(255,255,255,.08);

border:
1px solid rgba(255,255,255,.08);

backdrop-filter:blur(12px);

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

max-width:700px;

font-size:18px;

line-height:1.8;

opacity:.85;

}

/* CARDS */

.receta-card{

background:
rgba(255,255,255,.06);

border:
1px solid rgba(255,255,255,.08);

backdrop-filter:blur(16px);

border-radius:30px;

overflow:hidden;

transition:.4s ease;

color:white;

box-shadow:
0 8px 30px rgba(0,0,0,.25);

}

.receta-card:hover{

transform:
translateY(-10px)
scale(1.02);

box-shadow:
0 12px 40px rgba(236,72,153,.22);

}

/* IMAGEN */

.img-container{

position:relative;

overflow:hidden;

}

.card-img-top{

height:280px;

object-fit:cover;

transition:.5s;

}

.receta-card:hover .card-img-top{

transform:scale(1.08);

}

.img-overlay{

position:absolute;

top:20px;
left:20px;

}

.categoria-badge{

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
0 0 20px rgba(239,68,68,.4);

}

.categoria-badge.pink{

background:
linear-gradient(
135deg,
#ec4899,
#f472b6
);

}

.categoria-badge.blue{

background:
linear-gradient(
135deg,
#06b6d4,
#3b82f6
);

}

/* MINI BADGES */

.mini-badge{

padding:8px 14px;

border-radius:20px;

background:
rgba(255,255,255,.08);

font-size:13px;

}

.time{

background:
rgba(139,92,246,.18);

}

/* TITLES */

.card-title{

font-size:28px;

font-weight:700;

margin-bottom:15px;

}

/* TEXT */

.card-text{

opacity:.82;

line-height:1.7;

}

/* BUTTONS */

.btn-receta,
.btn-receta-sm{

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
0 0 20px rgba(236,72,153,.30);

}

.btn-receta{

padding:14px 28px;

}

.btn-receta-sm{

padding:10px 18px;

}

.btn-receta:hover,
.btn-receta-sm:hover{

transform:
translateY(-3px)
scale(1.04);

color:white;

box-shadow:
0 0 25px rgba(236,72,153,.45);

}

.btn-outline-glass{

background:
rgba(255,255,255,.05);

border:
1px solid rgba(255,255,255,.12);

color:white;

border-radius:40px;

padding:14px 28px;

backdrop-filter:blur(10px);

}

.btn-outline-glass:hover{

background:
rgba(255,255,255,.12);

color:white;

}

/* RATING */

.rating{

font-size:18px;

}

/* EXTRA SECTION */

.extra-section{

padding:70px 40px;

border-radius:35px;

background:
rgba(255,255,255,.05);

border:
1px solid rgba(255,255,255,.08);

backdrop-filter:blur(16px);

}

.extra-img{

border-radius:30px;

box-shadow:
0 0 35px rgba(236,72,153,.25);

}

/* CREATOR */

.creator-box{

padding:40px;

border-radius:30px;

background:
rgba(255,255,255,.05);

border:
1px solid rgba(255,255,255,.08);

backdrop-filter:blur(12px);

}

/* RESPONSIVE */

@media(max-width:768px){

.menu-hero{

padding:70px 20px;

}

.menu-hero h1{

font-size:42px;

}

.card-title{

font-size:24px;

}

}

</style>

@endsection