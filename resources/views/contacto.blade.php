{{-- Extiende el layout principal de la aplicación (layouts/app.blade.php) --}}
@extends('layouts.app')

{{-- Define el título de la pestaña del navegador para esta vista --}}
@section('title', 'Contacto')

{{-- ============================================================
     CONTENIDO PRINCIPAL
     Este bloque se inyecta en el @yield('content') del layout
============================================================ --}}
@section('content')

    {{-- Título principal de la página --}}
    <h2 class="text-center mb-4">📞 Contacto ASHDAY Recetas</h2>

    {{-- Descripción introductoria centrada --}}
    <p class="text-center fs-5">
        ¿Tienes alguna duda sobre nuestras recetas o quieres compartir una idea deliciosa?
        ¡Nos encantaría saber de ti!
    </p>

    {{-- ============================================================
         FILA DE DOS COLUMNAS
         col-md-6: cada columna ocupa la mitad en pantallas medianas
         En móvil se apilan verticalmente de forma automática
    ============================================================ --}}
    <div class="row mt-4">

        {{-- COLUMNA IZQUIERDA: Información de contacto --}}
        <div class="col-md-6 mb-4">
            <div class="card shadow p-4 h-100">
                {{-- h-100: iguala la altura de la card con la columna de la imagen --}}

                <h4 class="mb-3">📬 Información de contacto</h4>

                <p><strong>📧 Correo:</strong> contacto@ashdayrecetas.com</p>
                <p><strong>📱 Teléfono:</strong> +57 300 000 0000</p>
                <p><strong>📍 Ubicación:</strong> Colombia</p>

                <p>
                    También puedes escribirnos para compartir tus recetas favoritas,
                    sugerencias o comentarios sobre nuestra página.
                </p>

            </div>
        </div>

        {{-- COLUMNA DERECHA: Imagen decorativa
             alt="": se agregó el atributo alt para accesibilidad y buenas prácticas HTML
             loading="lazy": carga diferida para mejorar el rendimiento de la página --}}
        <div class="col-md-6 mb-4">
            <img class="img-fluid rounded shadow w-100 h-100 object-fit-cover"
                 src="https://images.unsplash.com/photo-1498837167922-ddd27525d352"
                 alt="Imagen decorativa de contacto"
                 loading="lazy">
        </div>

    </div>

    {{-- Separador visual entre secciones --}}
    <hr class="mt-5">

    {{-- ============================================================
         SECCIÓN DE CRÉDITOS
         Muestra las desarrolladoras del proyecto
    ============================================================ --}}
    <div class="text-center mt-4">

        <h5>👩‍💻 Proyecto desarrollado por</h5>

        <p><strong>Ashlley Alejandra Castro</strong></p>
        <p><strong>Dayana Liseth Cuaran</strong></p>

        <p class="text-muted">Proyecto académico - Página web ASHDAY Recetas</p>

    </div>

@endsection