@extends('layouts.app')

@section('title', 'Menú')

@section('content')

<h2 class="text-center mb-4">🍽️ Recetas Destacadas</h2>

<p class="text-center mb-5">
Descubre algunas de nuestras recetas favoritas preparadas con amor en 
<strong>ASHDAY Recetas</strong>.
</p>

<div class="row g-4">

```
<!-- Receta 1 -->
<div class="col-md-4">
    <div class="card shadow-lg h-100">

        <img 
        src="https://images.unsplash.com/photo-1551782450-a2132b4ba21d"
        class="card-img-top"
        alt="Hamburguesa">

        <div class="card-body text-center">

            <h5 class="card-title">🍔 Hamburguesa Artesanal</h5>

            <p class="card-text">
            Deliciosa hamburguesa preparada con ingredientes frescos,
            pan suave y una combinación perfecta de sabores.
            </p>

            <button class="btn btn-warning">
                Ver receta
            </button>

        </div>

    </div>
</div>

<!-- Receta 2 -->
<div class="col-md-4">
    <div class="card shadow-lg h-100">

        <img 
        src="https://images.unsplash.com/photo-1490474418585-ba9bad8fd0ea"
        class="card-img-top"
        alt="Panqueques">

        <div class="card-body text-center">

            <h5 class="card-title">🥞 Panqueques Dulces</h5>

            <p class="card-text">
            Suaves panqueques acompañados con miel,
            frutas frescas y un toque de azúcar.
            </p>

            <button class="btn btn-warning">
                Ver receta
            </button>

        </div>

    </div>
</div>

<!-- Receta 3 -->
<div class="col-md-4">
    <div class="card shadow-lg h-100">

        <img 
        src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c"
        class="card-img-top"
        alt="Ensalada saludable">

        <div class="card-body text-center">

            <h5 class="card-title">🥗 Ensalada Saludable</h5>

            <p class="card-text">
            Una mezcla fresca de vegetales,
            perfecta para una alimentación equilibrada.
            </p>

            <button class="btn btn-warning">
                Ver receta
            </button>

        </div>

    </div>
</div>
```

</div>

<hr class="mt-5">

<div class="text-center">

<h5>👩‍💻 Proyecto desarrollado por</h5>

<p><strong>Ashlley Alejandra Castro</strong></p>

<p><strong>Dayana Liseth Cuaran</strong></p>

<p class="text-muted">
Proyecto académico - ASHDAY Recetas
</p>

</div>

@endsection