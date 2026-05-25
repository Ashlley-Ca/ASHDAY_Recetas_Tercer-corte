{{-- Extiende el layout principal --}}
@extends('layouts.app')

{{-- Título de la página --}}
@section('title', 'Menú')

@section('content')

<div class="container py-5">

    {{-- ============================================================
         HERO PRINCIPAL DEL MENÚ
    ============================================================ --}}
    <section class="menu-hero text-center mb-5">

        <div class="hero-glow"></div>

        <span class="hero-badge">
            🍽️ Catálogo gastronómico premium
        </span>

        <h1 class="display-3 fw-bold mt-4">
            Nuestro
            <span class="text-gradient">Menú</span>
        </h1>

        <p class="hero-text mx-auto mt-4">
            Explora nuestros platos más deliciosos preparados
            con ingredientes frescos, creatividad y mucho sabor.
        </p>

        <div class="mt-4 d-flex justify-content-center gap-3 flex-wrap">

            <a href="{{ route('recetas') }}"
               class="btn btn-receta btn-lg">
                📖 Ver recetas
            </a>

            <a href="{{ route('contacto') }}"
               class="btn btn-outline-glass btn-lg">
                ✨ Reservar mesa
            </a>

        </div>

    </section>

    {{-- ============================================================
         CATEGORÍAS DEL MENÚ
    ============================================================ --}}
    <div class="d-flex justify-content-center flex-wrap gap-3 mb-5">

        <span class="menu-category active">
            🍔 Comida rápida
        </span>

        <span class="menu-category">
            🍕 Italiana
        </span>

        <span class="menu-category">
            🥗 Saludable
        </span>

        <span class="menu-category">
            🍰 Postres
        </span>

        <span class="menu-category">
            ☕ Bebidas
        </span>

    </div>

    {{-- ============================================================
         CARDS DEL MENÚ
    ============================================================ --}}
    <div class="row g-4">

        {{-- ====================================================
             PRODUCTO 1
        ==================================================== --}}
        <div class="col-lg-4 col-md-6">

            <div class="card menu-card h-100">

                <div class="img-container">

                    <img src="{{ asset('img/hamburguesa.jpg.jpg') }}"
                         class="card-img-top"
                         alt="Hamburguesa Gourmet">

                    <div class="img/pizza">
                        <span class="price-badge">
                            $28.000
                        </span>
                    </div>

                </div>

                <div class="card-body">

                    <div class="d-flex justify-content-between mb-3">

                        <span class="mini-badge">
                            🍔 Gourmet
                        </span>

                        <span class="mini-badge time">
                            ⏱️ 20 min
                        </span>

                    </div>

                    <h3 class="card-title">
                        Hamburguesa Premium
                    </h3>

                    <p class="card-text">
                        Carne artesanal, queso cheddar,
                        vegetales frescos y papas crujientes.
                    </p>

                    <div class="d-flex justify-content-between align-items-center mt-4">

                        <div class="rating">
                            ⭐⭐⭐⭐⭐
                        </div>

                        <button class="btn btn-menu">
                            Ordenar
                        </button>

                    </div>

                </div>

            </div>

        </div>

        {{-- ====================================================
             PRODUCTO 2
        ==================================================== --}}
        <div class="col-lg-4 col-md-6">

            <div class="card menu-card h-100">

                <div class="img-container">

                    <img src="{{ asset('img/pizza.jpg') }}"
                         class="card-img-top"
                         alt="Pizza">

                    <div class="img-overlay">
                        <span class="price-badge pink">
                            $35.000
                        </span>
                    </div>

                </div>

                <div class="card-body">

                    <div class="d-flex justify-content-between mb-3">

                        <span class="mini-badge">
                            🍕 Italiana
                        </span>

                        <span class="mini-badge time">
                            ⏱️ 30 min
                        </span>

                    </div>

                    <h3 class="card-title">
                        Pizza Artesanal
                    </h3>

                    <p class="card-text">
                        Salsa napolitana, queso mozzarella
                        y toppings seleccionados.
                    </p>

                    <div class="d-flex justify-content-between align-items-center mt-4">

                        <div class="rating">
                            ⭐⭐⭐⭐⭐
                        </div>

                        <button class="btn btn-menu">
                            Ordenar
                        </button>

                    </div>

                </div>

            </div>

        </div>

        {{-- ====================================================
             PRODUCTO 3
        ==================================================== --}}
        <div class="col-lg-4 col-md-6">

            <div class="card menu-card h-100">

                <div class="img-container">

                    <img src="{{ asset('img/postre.jpg') }}"
                         class="card-img-top"
                         alt="Postre">

                    <div class="img-overlay">
                        <span class="price-badge blue">
                            $16.000
                        </span>
                    </div>

                </div>

                <div class="card-body">

                    <div class="d-flex justify-content-between mb-3">

                        <span class="mini-badge">
                            🍰 Dulce
                        </span>

                        <span class="mini-badge time">
                            ⏱️ 10 min
                        </span>

                    </div>

                    <h3 class="card-title">
                        Postre Especial
                    </h3>

                    <p class="card-text">
                        Delicioso postre artesanal
                        con frutas y chocolate premium.
                    </p>

                    <div class="d-flex justify-content-between align-items-center mt-4">

                        <div class="rating">
                            ⭐⭐⭐⭐☆
                        </div>

                        <button class="btn btn-menu">
                            Ordenar
                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- ============================================================
         SECCIÓN EXTRA
    ============================================================ --}}
    <section class="extra-section mt-5">

        <div class="row align-items-center">

            <div class="col-lg-6 mb-4 mb-lg-0">

                <h2 class="fw-bold mb-4">
                    ✨ Más que comida, una experiencia
                </h2>

                <p class="opacity-75 fs-5">
                    En ASHDAY Recetas buscamos crear momentos
                    inolvidables a través de sabores únicos.
                </p>

                <p class="opacity-75">
                    Cada plato está preparado con pasión,
                    creatividad y una presentación moderna.
                </p>

                <a href="{{ route('contacto') }}"
                   class="btn btn-receta mt-3">
                    📞 Contáctanos
                </a>

            </div>

            <div class="col-lg-6 text-center">

                <img src="{{ asset('img/gourmet.jpg') }}"
                     class="img-fluid extra-img"
                     alt="Chef">

            </div>

        </div>

    </section>

</div>

{{-- ============================================================
     ESTILOS
============================================================ --}}
<style>

    .menu-hero{
        position:relative;
        padding:90px 30px;
        border-radius:35px;
        overflow:hidden;
        background:linear-gradient(
            135deg,
            rgba(139,92,246,.22),
            rgba(236,72,153,.16),
            rgba(6,182,212,.14)
        );
        border:1px solid rgba(255,255,255,.08);
        backdrop-filter:blur(18px);
    }

    .hero-glow{
        position:absolute;
        width:500px;
        height:500px;
        background:radial-gradient(circle,
            rgba(255,255,255,.14),
            transparent 70%);
        top:-250px;
        right:-150px;
    }

    .hero-badge{
        display:inline-block;
        padding:10px 18px;
        border-radius:30px;
        background:rgba(255,255,255,.08);
        border:1px solid rgba(255,255,255,.08);
    }

    .text-gradient{
        background:linear-gradient(
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

    .menu-category{
        padding:12px 20px;
        border-radius:30px;
        background:rgba(255,255,255,.06);
        border:1px solid rgba(255,255,255,.08);
        cursor:pointer;
        transition:.3s;
    }

    .menu-category:hover,
    .menu-category.active{
        background:linear-gradient(
            135deg,
            #8b5cf6,
            #ec4899
        );
    }

    .menu-card{
        background:rgba(255,255,255,.06);
        border:1px solid rgba(255,255,255,.08);
        backdrop-filter:blur(16px);
        border-radius:30px;
        overflow:hidden;
        transition:.4s ease;
        color:white;
    }

    .menu-card:hover{
        transform:translateY(-10px) scale(1.02);
        box-shadow:0 12px 40px rgba(236,72,153,.22);
    }

    .img-container{
        position:relative;
        overflow:hidden;
    }

    .card-img-top{
        height:280px;
        object-fit:cover;
        transition:.5s;
    }

    .menu-card:hover .card-img-top{
        transform:scale(1.08);
    }

    .img-overlay{
        position:absolute;
        top:20px;
        right:20px;
    }

    .price-badge{
        padding:10px 18px;
        border-radius:30px;
        font-weight:700;
        background:linear-gradient(135deg,#22c55e,#16a34a);
        color:white;
    }

    .price-badge.pink{
        background:linear-gradient(135deg,#ec4899,#f472b6);
    }

    .price-badge.blue{
        background:linear-gradient(135deg,#06b6d4,#3b82f6);
    }

    .mini-badge{
        padding:8px 14px;
        border-radius:20px;
        background:rgba(255,255,255,.08);
        font-size:13px;
    }

    .time{
        background:rgba(139,92,246,.18);
    }

    .card-title{
        font-size:28px;
        font-weight:700;
    }

    .card-text{
        opacity:.82;
        line-height:1.7;
    }

    .btn-receta,
    .btn-menu{
        background:linear-gradient(
            135deg,
            #8b5cf6,
            #ec4899
        );
        border:none;
        color:white;
        font-weight:600;
        border-radius:40px;
        transition:.3s;
    }

    .btn-receta{
        padding:14px 28px;
    }

    .btn-menu{
        padding:10px 18px;
    }

    .btn-receta:hover,
    .btn-menu:hover{
        transform:translateY(-3px);
        color:white;
    }

    .btn-outline-glass{
        background:rgba(255,255,255,.05);
        border:1px solid rgba(255,255,255,.12);
        color:white;
        border-radius:40px;
        padding:14px 28px;
    }

    .btn-outline-glass:hover{
        background:rgba(255,255,255,.12);
        color:white;
    }

    .extra-section{
        padding:70px 40px;
        border-radius:35px;
        background:rgba(255,255,255,.05);
        border:1px solid rgba(255,255,255,.08);
        backdrop-filter:blur(16px);
    }

    .extra-img{
        border-radius:30px;
        box-shadow:0 0 35px rgba(236,72,153,.25);
    }

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