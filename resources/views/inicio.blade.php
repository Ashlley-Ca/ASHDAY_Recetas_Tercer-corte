@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

<h1 class="text-center mb-4">🍓 Bienvenidos a ASHDAY Recetas</h1>

<div class="row align-items-center">

    <div class="col-md-6">

        <p>
            Bienvenido a <strong>ASHDAY Recetas</strong>, un espacio creado para compartir
            recetas deliciosas, fáciles y creativas que puedes preparar en casa.
        </p>

        <p>
            Aquí encontrarás ideas de cocina, postres, comidas rápidas y
            opciones saludables para disfrutar con tu familia y amigos.
        </p>

        <p>
            Este proyecto fue desarrollado como parte de un trabajo académico
            de programación web.
        </p>

        <p class="mt-3">
            <strong>Creadoras del proyecto:</strong><br>
            👩‍🍳 Ashlley Alejandra Castro<br>
            👩‍🍳 Dayana Liseth Cuaran
        </p>

    </div>

    <div class="col-md-6">

        <img class="img-fluid rounded shadow"
             src="https://images.unsplash.com/photo-1556911220-e15b29be8c8f"
             alt="Recetas">

    </div>

</div>

@endsection