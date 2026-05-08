@extends('layouts.app')

@section('title', 'Nosotros')

@section('content')

<div class="container py-5">

    <!-- HERO -->

    <section class="nosotros-hero text-center mb-5">

        <div class="hero-light"></div>

        <span class="hero-badge">
            ✨ Comunidad gastronómica
        </span>

        <h1 class="display-3 fw-bold mt-4">

            Sobre
            <span class="text-gradient">
                ASHDAY Recetas
            </span>

        </h1>

        <p class="hero-text mx-auto mt-4">

            En <strong>ASHDAY Recetas</strong> creemos que cocinar es una
            experiencia llena de creatividad, pasión y momentos especiales.
            Compartimos recetas deliciosas, ideas innovadoras y consejos
            gastronómicos para inspirar a toda nuestra comunidad.

        </p>

        <div class="mt-4 d-flex justify-content-center gap-3 flex-wrap">

            <a href="{{ route('menu') }}"
               class="btn btn-receta btn-lg">

                🍽️ Explorar recetas

            </a>

            <a href="{{ route('contacto') }}"
               class="btn btn-glass btn-lg">

                📩 Contacto

            </a>

        </div>

    </section>

    <!-- TARJETAS -->

    <section class="mb-5">

        <div class="row g-4">

            <!-- MISIÓN -->

            <div class="col-md-4">

                <div class="info-card h-100">

                    <div class="icon-circle purple">
                        🍴
                    </div>

                    <h3 class="mt-4 fw-bold">
                        Nuestra misión
                    </h3>

                    <p class="mt-3 opacity-75">

                        Inspirar a las personas a cocinar de manera
                        divertida, fácil y creativa desde casa.

                    </p>

                </div>

            </div>

            <!-- VISIÓN -->

            <div class="col-md-4">

                <div class="info-card h-100">

                    <div class="icon-circle pink">
                        🚀
                    </div>

                    <h3 class="mt-4 fw-bold">
                        Nuestra visión
                    </h3>

                    <p class="mt-3 opacity-75">

                        Construir una comunidad moderna donde compartir
                        recetas y experiencias gastronómicas.

                    </p>

                </div>

            </div>

            <!-- COMUNIDAD -->

            <div class="col-md-4">

                <div class="info-card h-100">

                    <div class="icon-circle blue">
                        ❤️
                    </div>

                    <h3 class="mt-4 fw-bold">
                        Nuestra comunidad
                    </h3>

                    <p class="mt-3 opacity-75">

                        Personas apasionadas por la cocina, los sabores
                        y la creatividad culinaria.

                    </p>

                </div>

            </div>

        </div>

    </section>

    <!-- PQRS -->

    <section class="pqrs-section">

        <div class="row align-items-center g-5">

            <!-- TEXTO -->

            <div class="col-lg-5">

                <span class="hero-badge">
                    📩 Atención al usuario
                </span>

                <h2 class="fw-bold display-5 mt-4">

                    Formulario
                    <span class="text-gradient">
                        PQRS
                    </span>

                </h2>

                <p class="mt-4 fs-5 opacity-75">

                    Tu opinión es muy importante para nosotros.
                    Puedes enviarnos peticiones, quejas, reclamos,
                    sugerencias o felicitaciones.

                </p>

                <div class="feature-list mt-4">

                    <div class="feature-item">
                        ✅ Respuesta rápida
                    </div>

                    <div class="feature-item">
                        ✅ Atención personalizada
                    </div>

                    <div class="feature-item">
                        ✅ Mejora continua del proyecto
                    </div>

                </div>

            </div>

            <!-- FORMULARIO -->

            <div class="col-lg-7">

                <div class="form-card">

                    @if(session('success'))

                    <div class="alert alert-custom-success">

                        <i class="bi bi-check-circle-fill"></i>

                        {{ session('success') }}

                    </div>

                    @endif

                    <form action="{{ route('pqrs.store') }}"
                          method="POST">

                        @csrf

                        <div class="row">

                            <div class="col-md-6 mb-4">

                                <label class="form-label">
                                    👤 Nombres
                                </label>

                                <input type="text"
                                       name="nombres"
                                       class="form-control"
                                       placeholder="Ingresa tu nombre"
                                       required>

                            </div>

                            <div class="col-md-6 mb-4">

                                <label class="form-label">
                                    👥 Apellidos
                                </label>

                                <input type="text"
                                       name="apellidos"
                                       class="form-control"
                                       placeholder="Ingresa tu apellido"
                                       required>

                            </div>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                📧 Correo electrónico
                            </label>

                            <input type="email"
                                   name="correo"
                                   class="form-control"
                                   placeholder="ejemplo@email.com"
                                   required>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                📌 Tipo de mensaje
                            </label>

                            <select name="tipo"
                                    class="form-select"
                                    required>

                                <option value="">
                                    Selecciona una opción
                                </option>

                                <option value="Petición">
                                    Petición
                                </option>

                                <option value="Queja">
                                    Queja
                                </option>

                                <option value="Reclamo">
                                    Reclamo
                                </option>

                                <option value="Sugerencia">
                                    Sugerencia
                                </option>

                                <option value="Felicitación">
                                    Felicitación
                                </option>

                            </select>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                💬 Mensaje
                            </label>

                            <textarea name="mensaje"
                                      rows="5"
                                      class="form-control"
                                      placeholder="Escribe aquí tu mensaje..."
                                      required></textarea>

                        </div>

                        <div class="form-check custom-check mb-4">

                            <input type="checkbox"
                                   name="terminos"
                                   value="1"
                                   class="form-check-input"
                                   required>

                            <label class="form-check-label">

                                Acepto los términos y condiciones

                            </label>

                        </div>

                        <button type="submit"
                                class="btn btn-receta w-100 btn-lg">

                            📤 Enviar mensaje

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </section>

    <!-- CREADORAS -->

    <section class="creator-section text-center mt-5">

        <div class="creator-card">

            <span class="hero-badge">
                👩‍💻 Equipo creador
            </span>

            <h2 class="fw-bold mt-4 mb-4">

                Proyecto desarrollado por

            </h2>

            <div class="row justify-content-center g-4">

                <div class="col-md-4">

                    <div class="creator-item">

                        <div class="creator-avatar">
                            👩‍🍳
                        </div>

                        <h5 class="fw-bold mt-3">
                            Ashlley Alejandra Castro
                        </h5>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="creator-item">

                        <div class="creator-avatar">
                            👩‍🍳
                        </div>

                        <h5 class="fw-bold mt-3">
                            Dayana Liseth Cuaran
                        </h5>

                    </div>

                </div>

            </div>

            <p class="mt-4 opacity-75">

                🚀 Proyecto académico — Programación Avanzada 2026

            </p>

        </div>

    </section>

</div>

<!-- ESTILOS -->

<style>

/* HERO */

.nosotros-hero{

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

/* INFO CARDS */

.info-card{

padding:40px 30px;

border-radius:30px;

background:
rgba(255,255,255,.05);

border:
1px solid rgba(255,255,255,.08);

backdrop-filter:blur(15px);

text-align:center;

transition:.4s ease;

box-shadow:
0 8px 30px rgba(0,0,0,.22);

}

.info-card:hover{

transform:
translateY(-10px)
scale(1.02);

box-shadow:
0 0 35px rgba(236,72,153,.25);

}

/* ICONS */

.icon-circle{

width:90px;
height:90px;

margin:auto;

border-radius:50%;

display:flex;
align-items:center;
justify-content:center;

font-size:35px;

color:white;

box-shadow:
0 0 25px rgba(255,255,255,.18);

}

.purple{

background:
linear-gradient(
135deg,
#8b5cf6,
#a855f7
);

}

.pink{

background:
linear-gradient(
135deg,
#ec4899,
#f472b6
);

}

.blue{

background:
linear-gradient(
135deg,
#06b6d4,
#3b82f6
);

}

/* PQRS */

.pqrs-section{

margin-top:70px;

padding:60px 40px;

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

/* FORM */

.form-card{

padding:40px;

border-radius:30px;

background:
rgba(255,255,255,.06);

border:
1px solid rgba(255,255,255,.08);

backdrop-filter:blur(18px);

box-shadow:
0 8px 35px rgba(0,0,0,.25);

}

/* INPUTS */

.form-control,
.form-select{

background:
rgba(255,255,255,.06) !important;

border:
1px solid rgba(255,255,255,.08) !important;

border-radius:18px !important;

padding:14px !important;

color:white !important;

}

.form-control:focus,
.form-select:focus{

border-color:#c084fc !important;

box-shadow:
0 0 20px rgba(192,132,252,.35) !important;

}

.form-control::placeholder{

color:#cbd5e1;

}

/* LABEL */

.form-label{

font-weight:600;

margin-bottom:10px;

}

/* CHECKBOX */

.custom-check{

padding:12px;

border-radius:16px;

background:
rgba(255,255,255,.04);

}

/* BUTTON */

.btn-receta{

background:
linear-gradient(
135deg,
#8b5cf6,
#ec4899
);

border:none;

color:white;

padding:14px 28px;

border-radius:40px;

font-weight:600;

transition:.3s;

box-shadow:
0 0 25px rgba(236,72,153,.30);

}

.btn-receta:hover{

transform:
translateY(-3px)
scale(1.03);

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

/* ALERT */

.alert-custom-success{

background:
rgba(34,197,94,.15);

border:
1px solid rgba(34,197,94,.25);

padding:18px;

border-radius:18px;

color:#d1fae5;

}

/* CREATOR */

.creator-card{

padding:60px 30px;

border-radius:35px;

background:
rgba(255,255,255,.05);

border:
1px solid rgba(255,255,255,.08);

backdrop-filter:blur(18px);

}

.creator-item{

padding:25px;

border-radius:25px;

background:
rgba(255,255,255,.04);

transition:.3s;

}

.creator-item:hover{

transform:
translateY(-6px);

background:
rgba(255,255,255,.06);

}

.creator-avatar{

width:90px;
height:90px;

margin:auto;

border-radius:50%;

display:flex;
align-items:center;
justify-content:center;

font-size:35px;

background:
linear-gradient(
135deg,
#8b5cf6,
#ec4899
);

box-shadow:
0 0 25px rgba(236,72,153,.35);

}

/* RESPONSIVE */

@media(max-width:768px){

.nosotros-hero{

padding:70px 20px;

}

.nosotros-hero h1{

font-size:42px;

}

.form-card{

padding:25px;

}

.pqrs-section{

padding:35px 20px;

}

}

</style>

@endsection