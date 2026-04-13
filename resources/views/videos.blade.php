@extends('layouts.app')

@section('title','Videos de Recetas')

@section('content')

<h2 class="text-center mb-4">🎬 Videos de Recetas</h2>

<p class="text-center mb-5">
Aprende a preparar deliciosas recetas paso a paso con nuestra selección de videos.
</p>

<div class="row g-4">

<!-- VIDEO 1 -->

<div class="col-md-4">

<div class="card h-100">

<div class="ratio ratio-16x9">
<iframe 
src="https://www.youtube.com/embed/1APwq1df6Mw"
title="Panqueques Esponjosos"
allowfullscreen>
</iframe>
</div>

<div class="card-body text-center">

<h5>🥞 Panqueques Esponjosos</h5>

<p>
Aprende a preparar panqueques suaves y deliciosos
perfectos para el desayuno.
</p>

</div>

</div>

</div>

<!-- VIDEO 2 -->

<div class="col-md-4">

<div class="card h-100">

<div class="ratio ratio-16x9">
<iframe 
src="https://www.youtube.com/embed/foD42-73wdI"
title="Hamburguesa Gourmet"
allowfullscreen>
</iframe>
</div>

<div class="card-body text-center">

<h5>🍔 Hamburguesa Gourmet</h5>

<p>
Descubre cómo preparar una hamburguesa casera
jugosa y llena de sabor.
</p>

</div>

</div>

</div>

<!-- VIDEO 3 -->

<div class="col-md-4">

<div class="card h-100">

<div class="ratio ratio-16x9">
<iframe 
src="https://www.youtube.com/embed/3AAdKl1UYZs"
title="Ensalada Fresca"
allowfullscreen>
</iframe>
</div>

<div class="card-body text-center">

<h5>🥗 Ensalada Fresca y Saludable</h5>

<p>
Una receta ligera y nutritiva perfecta
para cualquier momento del día.
</p>

</div>

</div>

</div>

</div>

@endsection