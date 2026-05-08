```php
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title') | ASHDAY Recetas</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

/* ========================================
   VARIABLES GLOBALES
======================================== */

:root{

--primary:#8b5cf6;
--secondary:#ec4899;
--accent:#22d3ee;

--bg-dark:#070b17;
--bg-card:rgba(255,255,255,0.06);

--text:#f8fafc;
--text-soft:#cbd5e1;

--glass-border:rgba(255,255,255,0.08);

--shadow-purple:0 0 40px rgba(139,92,246,.35);
--shadow-pink:0 0 40px rgba(236,72,153,.25);

}

/* ========================================
   BODY
======================================== */

body{

font-family:'Poppins',sans-serif;

background:
radial-gradient(circle at top left,
rgba(139,92,246,.35),
transparent 28%),

radial-gradient(circle at bottom right,
rgba(236,72,153,.30),
transparent 30%),

radial-gradient(circle at center,
rgba(34,211,238,.12),
transparent 35%),

linear-gradient(
135deg,
#050816,
#0b1120,
#111827,
#1e1b4b
);

color:var(--text);

min-height:100vh;

overflow-x:hidden;

position:relative;

}

/* ========================================
   EFECTOS DE FONDO
======================================== */

body::before,
body::after{

content:"";

position:fixed;

width:450px;
height:450px;

border-radius:50%;

filter:blur(120px);

opacity:.35;

z-index:-1;

animation:float 10s ease-in-out infinite;

}

body::before{

background:#8b5cf6;

top:-120px;
left:-120px;

}

body::after{

background:#ec4899;

bottom:-150px;
right:-120px;

animation-delay:5s;

}

@keyframes float{

0%{transform:translateY(0px);}
50%{transform:translateY(25px);}
100%{transform:translateY(0px);}

}

/* ========================================
   SCROLLBAR
======================================== */

::-webkit-scrollbar{
width:10px;
}

::-webkit-scrollbar-track{
background:#111827;
}

::-webkit-scrollbar-thumb{
background:linear-gradient(#8b5cf6,#ec4899);
border-radius:20px;
}

/* ========================================
   TIPOGRAFÍA
======================================== */

h1,h2,h3,h4,h5{

font-family:'Playfair Display',serif;
font-weight:700;

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

/* ========================================
   NAVBAR
======================================== */

.navbar{

position:sticky;
top:0;
z-index:1000;

background:rgba(7,11,23,.75);

backdrop-filter:blur(18px);

border-bottom:1px solid rgba(255,255,255,.08);

padding:16px 0;

box-shadow:0 8px 30px rgba(0,0,0,.35);

}

.navbar-brand{

font-size:30px;
font-weight:700;

background:linear-gradient(
90deg,
#c084fc,
#f472b6,
#22d3ee
);

-webkit-background-clip:text;
-webkit-text-fill-color:transparent;

}

.navbar-toggler{

border:none;
background:rgba(255,255,255,.1);

}

.nav-link{

color:var(--text-soft) !important;

font-weight:500;

margin-left:12px;

position:relative;

transition:.35s;

}

.nav-link:hover{

color:white !important;

transform:translateY(-2px);

}

.nav-link::after{

content:"";

position:absolute;

left:0;
bottom:-4px;

width:0%;
height:2px;

background:linear-gradient(
90deg,
#8b5cf6,
#ec4899
);

transition:.35s;

}

.nav-link:hover::after{

width:100%;

}

/* ========================================
   HERO PRINCIPAL
======================================== */

.hero{

position:relative;

overflow:hidden;

padding:100px 50px;

border-radius:35px;

background:
linear-gradient(
135deg,
rgba(139,92,246,.28),
rgba(236,72,153,.20),
rgba(34,211,238,.12)
);

border:1px solid rgba(255,255,255,.08);

backdrop-filter:blur(22px);

box-shadow:
var(--shadow-purple),
var(--shadow-pink);

}

.hero::before{

content:"";

position:absolute;

width:600px;
height:600px;

background:
radial-gradient(circle,
rgba(255,255,255,.14),
transparent 70%);

top:-250px;
right:-250px;

}

.hero h1{

font-size:65px;

margin-bottom:20px;

line-height:1.1;

color:white;

}

.hero p{

font-size:18px;

max-width:750px;

margin:auto;

color:#dbe4f0;

}

/* ========================================
   BOTONES
======================================== */

.btn-receta{

background:
linear-gradient(
135deg,
#8b5cf6,
#ec4899
);

border:none;

padding:14px 28px;

border-radius:50px;

font-weight:600;

color:white;

box-shadow:
0 0 25px rgba(236,72,153,.35);

transition:.35s;

}

.btn-receta:hover{

transform:
translateY(-3px)
scale(1.05);

color:white;

box-shadow:
0 0 30px rgba(236,72,153,.45),
0 0 50px rgba(139,92,246,.35);

}

/* ========================================
   CARDS
======================================== */

.card{

background:rgba(255,255,255,.05);

border:1px solid rgba(255,255,255,.08);

backdrop-filter:blur(18px);

border-radius:28px;

padding:22px;

color:white;

overflow:hidden;

position:relative;

transition:.45s;

box-shadow:
0 10px 35px rgba(0,0,0,.30);

}

.card::before{

content:"";

position:absolute;

width:250px;
height:250px;

background:
radial-gradient(circle,
rgba(255,255,255,.12),
transparent);

top:-120px;
right:-120px;

}

.card:hover{

transform:
translateY(-10px)
scale(1.02);

box-shadow:
0 14px 45px rgba(0,0,0,.35),
0 0 35px rgba(236,72,153,.18);

}

/* ========================================
   FORMULARIOS
======================================== */

input,
textarea,
select{

background:rgba(255,255,255,.06) !important;

border:1px solid rgba(255,255,255,.08) !important;

border-radius:18px !important;

padding:14px !important;

color:white !important;

}

input::placeholder,
textarea::placeholder{

color:#cbd5e1;

}

input:focus,
textarea:focus,
select:focus{

border-color:#c084fc !important;

box-shadow:
0 0 15px rgba(192,132,252,.35) !important;

}

/* ========================================
   HEADER SECTION
======================================== */

.section-title{

font-size:42px;

margin-bottom:15px;

}

.section-subtitle{

color:#cbd5e1;

font-size:17px;

}

/* ========================================
   FOOTER
======================================== */

footer{

margin-top:100px;

padding:45px 20px;

text-align:center;

background:rgba(7,11,23,.70);

border-top:1px solid rgba(255,255,255,.08);

backdrop-filter:blur(18px);

color:#cbd5e1;

}

.footer-logo{

font-size:30px;
font-weight:700;

margin-bottom:10px;

background:linear-gradient(
90deg,
#c084fc,
#f472b6,
#22d3ee
);

-webkit-background-clip:text;
-webkit-text-fill-color:transparent;

}

/* ========================================
   RESPONSIVE
======================================== */

@media(max-width:992px){

.hero{

padding:70px 25px;

}

.hero h1{

font-size:42px;

}

.navbar-brand{

font-size:24px;

}

}

</style>

</head>

<body>

<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg">

<div class="container">

<a class="navbar-brand" href="{{ route('inicio') }}">
🍓 ASHDAY Recetas
</a>

<button class="navbar-toggler"
type="button"
data-bs-toggle="collapse"
data-bs-target="#menu">

<span class="navbar-toggler-icon"></span>

</button>

<div class="collapse navbar-collapse" id="menu">

<ul class="navbar-nav ms-auto align-items-lg-center">

<li class="nav-item">
<a class="nav-link" href="{{ route('inicio') }}">
<i class="bi bi-house-door"></i> Inicio
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ route('recetas') }}">
<i class="bi bi-journal-richtext"></i> Recetas
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ route('videos') }}">
<i class="bi bi-play-circle"></i> Videos
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ route('nosotros') }}">
<i class="bi bi-people"></i> Nosotros
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ route('contacto') }}">
<i class="bi bi-envelope"></i> Contacto
</a>
</li>

<!-- INVITADOS -->

@guest

<li class="nav-item">
<a class="nav-link" href="{{ route('login') }}">
<i class="bi bi-box-arrow-in-right"></i> Login
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ route('register') }}">
<i class="bi bi-person-plus"></i> Registro
</a>
</li>

@endguest

<!-- AUTENTICADOS -->

@auth

<li class="nav-item">
<a class="nav-link" href="{{ route('dashboard') }}">
<i class="bi bi-speedometer2"></i> Dashboard
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ route('mensajes') }}">
<i class="bi bi-chat-dots"></i> Mensajes
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ route('recetas.crear') }}">
<i class="bi bi-plus-circle"></i> Crear receta
</a>
</li>

<li class="nav-item ms-lg-3">

<form method="POST" action="{{ route('logout') }}">

@csrf

<button type="submit" class="btn btn-receta">
<i class="bi bi-box-arrow-right"></i> Salir
</button>

</form>

</li>

@endauth

</ul>

</div>

</div>

</nav>

<!-- HERO -->

<div class="container mt-5">

<div class="hero text-center">

<h1>
✨ Cocina con
<span class="text-gradient">
Creatividad
</span>
</h1>

<p class="mt-4">
Descubre recetas increíbles, comparte tus platos favoritos
y vive una experiencia gastronómica moderna,
visual y totalmente interactiva.
</p>

<div class="mt-5">

<a href="{{ route('recetas') }}"
class="btn btn-receta btn-lg px-5">
🍽️ Explorar recetas
</a>

</div>

</div>

</div>

<!-- HEADER OPCIONAL -->

@if(View::hasSection('header'))

<div class="container mt-5">

<div class="card">

@yield('header')

</div>

</div>

@endif

<!-- CONTENIDO -->

<main class="container py-5">

@yield('content')

</main>

<!-- FOOTER -->

<footer>

<div class="footer-logo">
🍰 ASHDAY Recetas
</div>

<p class="mb-2">
Proyecto académico - Programación Avanzada 2026
</p>

<p class="mb-0">
Creado por Ashlley Alejandra Castro y Dayana Liseth Cuaran
</p>

</footer>

<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
```
