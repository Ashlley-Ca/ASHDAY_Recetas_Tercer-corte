@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

<!-- HERO -->

<section class="hero text-center">

<div class="container">

<h1 class="display-3 fw-bold mb-4">
🍽️ Recetario Comunitario
</h1>

<p class="lead mb-5">
Comparte, descubre y disfruta recetas creadas por la comunidad.
Explora sabores únicos y dale vida a tu creatividad culinaria.
</p>

<div class="d-flex justify-content-center gap-3 flex-wrap">

<a href="{{ route('recetas') }}"
class="btn btn-receta btn-lg px-5">
🍴 Ver Recetas
</a>

@auth
<a href="{{ route('recetas.crear') }}"
class="btn btn-outline-light btn-lg rounded-pill px-5">
➕ Agregar Receta
</a>
@endauth

@guest
<a href="{{ route('register') }}"
class="btn btn-outline-light btn-lg rounded-pill px-5">
✨ Únete Ahora
</a>
@endguest

</div>

</div>

</section>


<!-- CATEGORÍAS -->

<section class="py-5">

<div class="container">

<div class="text-center mb-5">

<h2 class="fw-bold display-5">
🔥 Explora Categorías
</h2>

<p class="text-light opacity-75">
Encuentra recetas para cualquier momento del día.
</p>

</div>

<div class="row g-4">

<div class="col-md-3">

<div class="card text-center h-100">

<div class="card-body">

<h1 class="display-3 mb-3">🥐</h1>

<h4 class="fw-bold">
Desayunos
</h4>

<p class="opacity-75">
Empieza el día con energía y sabor.
</p>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card text-center h-100">

<div class="card-body">

<h1 class="display-3 mb-3">🍛</h1>

<h4 class="fw-bold">
Almuerzos
</h4>

<p class="opacity-75">
Recetas perfectas para compartir.
</p>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card text-center h-100">

<div class="card-body">

<h1 class="display-3 mb-3">🍲</h1>

<h4 class="fw-bold">
Cenas
</h4>

<p class="opacity-75">
Platos deliciosos para cerrar el día.
</p>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card text-center h-100">

<div class="card-body">

<h1 class="display-3 mb-3">🍰</h1>

<h4 class="fw-bold">
Postres
</h4>

<p class="opacity-75">
El toque dulce perfecto para todos.
</p>

</div>

</div>

</div>

</div>

</div>

</section>


<!-- BENEFICIOS -->

<section class="py-5">

<div class="container">

<div class="card p-5">

<div class="text-center mb-5">

<h2 class="display-5 fw-bold">
✨ ¿Por qué usar ASHDAY Recetas?
</h2>

<p class="opacity-75">
Una experiencia moderna para amantes de la cocina.
</p>

</div>

<div class="row text-center g-4">

<div class="col-md-4">

<h1 class="display-2">👨‍🍳</h1>

<h4 class="fw-bold mt-3">
Comparte
</h4>

<p class="opacity-75">
Publica tus mejores recetas y sorprende a todos.
</p>

</div>

<div class="col-md-4">

<h1 class="display-2">📖</h1>

<h4 class="fw-bold mt-3">
Aprende
</h4>

<p class="opacity-75">
Descubre nuevas preparaciones y técnicas.
</p>

</div>

<div class="col-md-4">

<h1 class="display-2">❤️</h1>

<h4 class="fw-bold mt-3">
Conecta
</h4>

<p class="opacity-75">
Forma parte de una comunidad gastronómica.
</p>

</div>

</div>

</div>

</div>

</section>


<!-- LLAMADO FINAL -->

<section class="py-5 text-center">

<div class="container">

<div class="hero">

<h2 class="display-5 fw-bold mb-4">
🚀 ¿Listo para compartir tu receta?
</h2>

<p class="mb-4">
Haz parte de ASHDAY Recetas y comparte tus mejores platos.
</p>

@auth

<a href="{{ route('recetas.crear') }}"
class="btn btn-receta btn-lg px-5">
➕ Crear Receta
</a>

@endauth

@guest

<a href="{{ route('register') }}"
class="btn btn-receta btn-lg px-5">
✨ Crear Cuenta
</a>

@endguest

</div>

</div>

</section>

@endsection