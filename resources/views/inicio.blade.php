```php
@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

<!-- HERO PRINCIPAL -->

<section class="mb-5">

<div class="card border-0 overflow-hidden p-0 hero-home">

<div class="row g-0 align-items-center">

<!-- TEXTO -->

<div class="col-lg-6 p-5">

<span class="badge bg-success mb-3 px-3 py-2 rounded-pill fs-6">
🔥 Plataforma gastronómica moderna
</span>

<h1 class="display-2 fw-bold mb-4">
🍓 Bienvenidos a
<span class="text-gradient">
ASHDAY Recetas
</span>
</h1>

<p class="lead opacity-75 mb-4">
Descubre recetas increíbles, comparte tus platos favoritos y
forma parte de una comunidad apasionada por la cocina.
</p>

<div class="d-flex flex-wrap gap-3 mt-4">

<a href="{{ route('recetas') }}"
class="btn btn-receta btn-lg px-5">
🍽️ Explorar recetas
</a>

@auth
<a href="{{ route('recetas.crear') }}"
class="btn btn-outline-light btn-lg rounded-pill px-5">
➕ Crear receta
</a>
@endauth

@guest
<a href="{{ route('register') }}"
class="btn btn-outline-light btn-lg rounded-pill px-5">
✨ Únete gratis
</a>
@endguest

</div>

<!-- STATS -->

<div class="row mt-5 g-4">

<div class="col-4">

<div class="mini-stat text-center">

<h2>500+</h2>
<p>Recetas</p>

</div>

</div>

<div class="col-4">

<div class="mini-stat text-center">

<h2>120+</h2>
<p>Usuarios</p>

</div>

</div>

<div class="col-4">

<div class="mini-stat text-center">

<h2>24/7</h2>
<p>Creatividad</p>

</div>

</div>

</div>

</div>

<!-- IMAGEN -->

<div class="col-lg-6">

<img
src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=1974&auto=format&fit=crop"
class="img-fluid hero-image"
alt="Recetas ASHDAY">

</div>

</div>

</div>

</section>


<!-- CATEGORÍAS -->

<section class="mb-5">

<div class="text-center mb-5">

<h2 class="display-5 fw-bold">
🍴 Explora Categorías
</h2>

<p class="opacity-75">
Encuentra recetas para cualquier momento del día.
</p>

</div>

<div class="row g-4">

<div class="col-md-3">

<div class="card categoria-card text-center p-4 h-100">

<div class="emoji">🥐</div>

<h4 class="fw-bold mt-3">
Desayunos
</h4>

<p class="opacity-75">
Empieza tu mañana con energía y sabor.
</p>

</div>

</div>

<div class="col-md-3">

<div class="card categoria-card text-center p-4 h-100">

<div class="emoji">🍛</div>

<h4 class="fw-bold mt-3">
Almuerzos
</h4>

<p class="opacity-75">
Recetas perfectas para compartir en familia.
</p>

</div>

</div>

<div class="col-md-3">

<div class="card categoria-card text-center p-4 h-100">

<div class="emoji">🍲</div>

<h4 class="fw-bold mt-3">
Cenas
</h4>

<p class="opacity-75">
Platos deliciosos para terminar el día.
</p>

</div>

</div>

<div class="col-md-3">

<div class="card categoria-card text-center p-4 h-100">

<div class="emoji">🍰</div>

<h4 class="fw-bold mt-3">
Postres
</h4>

<p class="opacity-75">
El toque dulce que todos aman.
</p>

</div>

</div>

</div>

</section>


<!-- SOBRE EL PROYECTO -->

<section class="mb-5">

<div class="card p-5 info-card">

<div class="row align-items-center">

<div class="col-lg-7">

<h2 class="display-5 fw-bold mb-4">
✨ Sobre ASHDAY Recetas
</h2>

<p class="lead opacity-75">
ASHDAY Recetas nació como un proyecto académico enfocado en
el desarrollo web moderno utilizando Laravel.
</p>

<p class="opacity-75">
La plataforma busca crear un espacio interactivo donde las personas
puedan descubrir nuevas recetas, compartir experiencias gastronómicas
y conectar mediante la cocina.
</p>

<div class="mt-4">

<h5 class="fw-bold">
👩‍🍳 Creadoras del proyecto
</h5>

<p class="mb-1">
Ashlley Alejandra Castro
</p>

<p>
Dayana Liseth Cuaran
</p>

</div>

</div>

<div class="col-lg-5 text-center">

<img
src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?q=80&w=1974&auto=format&fit=crop"
class="img-fluid rounded-4 shadow-lg"
alt="Comida">

</div>

</div>

</div>

</section>


<!-- CALL TO ACTION -->

<section class="text-center py-5">

<div class="hero-final p-5 rounded-5">

<h2 class="display-4 fw-bold mb-4">
🚀 ¿Listo para cocinar?
</h2>

<p class="lead mb-4">
Únete a nuestra comunidad y comparte tus mejores recetas.
</p>

@auth

<a href="{{ route('recetas.crear') }}"
class="btn btn-receta btn-lg px-5">
➕ Publicar receta
</a>

@endauth

@guest

<a href="{{ route('register') }}"
class="btn btn-receta btn-lg px-5">
✨ Crear cuenta
</a>

@endguest

</div>

</section>


<style>

/* HERO */

.hero-home{
background:
linear-gradient(
135deg,
rgba(139,92,246,0.18),
rgba(236,72,153,0.12),
rgba(6,182,212,0.10)
);

backdrop-filter:blur(18px);

border:1px solid rgba(255,255,255,0.08);

box-shadow:
0 0 35px rgba(139,92,246,0.2);
}

/* TEXTO GRADIENT */

.text-gradient{
background:linear-gradient(90deg,#c084fc,#f472b6,#22d3ee);
-webkit-background-clip:text;
-webkit-text-fill-color:transparent;
}

/* IMAGEN HERO */

.hero-image{
height:100%;
object-fit:cover;
min-height:600px;
transition:.5s;
}

.hero-image:hover{
transform:scale(1.03);
}

/* MINI STATS */

.mini-stat{
background:rgba(255,255,255,0.05);
padding:20px;
border-radius:20px;
border:1px solid rgba(255,255,255,0.08);
}

.mini-stat h2{
font-weight:700;
color:#22d3ee;
}

/* CATEGORÍAS */

.categoria-card{
transition:.4s;
overflow:hidden;
position:relative;
}

.categoria-card:hover{
transform:translateY(-12px) scale(1.03);
}

.emoji{
font-size:70px;
filter:drop-shadow(0 0 10px rgba(255,255,255,0.4));
}

/* INFO */

.info-card{
background:
linear-gradient(
135deg,
rgba(255,255,255,0.05),
rgba(255,255,255,0.03)
);
}

/* CTA FINAL */

.hero-final{
background:
linear-gradient(
135deg,
rgba(139,92,246,0.25),
rgba(236,72,153,0.20)
);

border:1px solid rgba(255,255,255,0.08);

box-shadow:
0 0 40px rgba(236,72,153,0.18);
}

/* RESPONSIVE */

@media(max-width:992px){

.hero-image{
min-height:350px;
}

}

</style>

@endsection
```
