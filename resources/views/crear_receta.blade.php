@extends('layouts.app')

@section('title', 'Agregar Receta')

@section('content')

<div class="container py-5">

    {{-- ENCABEZADO --}}
    <div class="text-center mb-5">

        <span class="badge titulo-badge px-4 py-2 rounded-pill mb-3">
            ✨ Nueva Receta
        </span>

        <h1 class="display-4 fw-bold titulo-principal">
            🍽️ Comparte tu receta favorita
        </h1>

        <p class="texto-secundario mt-3">
            Publica recetas deliciosas, creativas y sorprende
            a toda la comunidad de <strong>ASHDAY Recetas</strong>.
        </p>

    </div>

    {{-- ERRORES --}}
    @if ($errors->any())

        <div class="alert alert-danger border-0 shadow-lg rounded-4 mb-4">

            <h5 class="fw-bold mb-3">
                ⚠️ Hay algunos errores en el formulario
            </h5>

            <ul class="mb-0">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="card formulario-card border-0 overflow-hidden">

                {{-- HEADER --}}
                <div class="card-header formulario-header text-center py-4 border-0">

                    <h2 class="fw-bold mb-2">
                        👨‍🍳 Información de la receta
                    </h2>

                    <p class="mb-0 opacity-75">
                        Completa todos los campos para compartir tu creación culinaria.
                    </p>

                </div>

                {{-- FORMULARIO --}}
                <div class="card-body p-5">

                    <form action="{{ route('recetas.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        {{-- NOMBRE Y AUTOR --}}
                        <div class="row">

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">
                                    🍴 Nombre de la receta
                                </label>

                                <input type="text"
                                       name="nombre"
                                       class="form-control custom-input"
                                       placeholder="Ej: Hamburguesa Gourmet"
                                       required>

                            </div>

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">
                                    👨‍🍳 Autor
                                </label>

                                <input type="text"
                                       name="autor"
                                       class="form-control custom-input"
                                       placeholder="Tu nombre"
                                       required>

                            </div>

                        </div>

                        {{-- CATEGORIA Y TIEMPO --}}
                        <div class="row">

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">
                                    📂 Categoría
                                </label>

                                <select name="categoria"
                                        class="form-select custom-input"
                                        required>

                                    <option value="">
                                        Seleccione una categoría
                                    </option>

                                    <option value="Desayuno">
                                        🥐 Desayuno
                                    </option>

                                    <option value="Almuerzo">
                                        🍛 Almuerzo
                                    </option>

                                    <option value="Cena">
                                        🍲 Cena
                                    </option>

                                    <option value="Postre">
                                        🍰 Postre
                                    </option>

                                </select>

                            </div>

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">
                                    ⏱ Tiempo de preparación
                                </label>

                                <input type="number"
                                       name="tiempo"
                                       class="form-control custom-input"
                                       placeholder="Ej: 30 minutos"
                                       required>

                            </div>

                        </div>

                        {{-- DIFICULTAD --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                🔥 Nivel de dificultad
                            </label>

                            <select name="dificultad"
                                    class="form-select custom-input"
                                    required>

                                <option value="">
                                    Seleccione dificultad
                                </option>

                                <option value="Fácil">
                                    🟢 Fácil
                                </option>

                                <option value="Media">
                                    🟡 Media
                                </option>

                                <option value="Difícil">
                                    🔴 Difícil
                                </option>

                            </select>

                        </div>

                        {{-- INGREDIENTES --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                🧂 Ingredientes
                            </label>

                            <textarea name="ingredientes"
                                      class="form-control custom-input"
                                      rows="5"
                                      placeholder="Escribe los ingredientes..."
                                      required></textarea>

                        </div>

                        {{-- PREPARACION --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                👩‍🍳 Preparación
                            </label>

                            <textarea name="preparacion"
                                      class="form-control custom-input"
                                      rows="6"
                                      placeholder="Describe paso a paso la preparación..."
                                      required></textarea>

                        </div>

                        {{-- IMAGEN --}}
                        <div class="mb-5">

                            <label class="form-label fw-semibold">
                                📸 Imagen de la receta
                            </label>

                            <input type="file"
                                   name="imagen"
                                   class="form-control custom-file"
                                   accept="image/*">

                            <small class="texto-ayuda">
                                Agrega una imagen atractiva de tu receta.
                            </small>

                        </div>

                        {{-- BOTONES --}}
                        <div class="d-flex flex-wrap gap-3 justify-content-center">

                            <button type="submit"
                                    class="btn btn-guardar px-5 py-3">

                                🚀 Guardar Receta

                            </button>

                            <a href="{{ route('recetas') }}"
                               class="btn btn-cancelar px-5 py-3">

                                ↩️ Volver

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

{{-- ESTILOS --}}
<style>

.titulo-badge{
background:linear-gradient(135deg,#8b5cf6,#ec4899);
color:white;
font-size:.9rem;
letter-spacing:1px;
box-shadow:0 0 20px rgba(236,72,153,.4);
}

.titulo-principal{
background:linear-gradient(90deg,#ffffff,#c084fc,#f472b6);
-webkit-background-clip:text;
-webkit-text-fill-color:transparent;
}

.texto-secundario{
color:#cbd5e1;
font-size:1.1rem;
max-width:700px;
margin:auto;
}

.formulario-card{
background:rgba(255,255,255,.08);
backdrop-filter:blur(18px);
border:1px solid rgba(255,255,255,.08);

box-shadow:
0 0 30px rgba(139,92,246,.18),
0 0 50px rgba(236,72,153,.08);
}

.formulario-header{
background:
linear-gradient(
135deg,
rgba(139,92,246,.35),
rgba(236,72,153,.25),
rgba(6,182,212,.2)
);

color:white;
}

.custom-input{
background:rgba(255,255,255,.08)!important;
border:1px solid rgba(255,255,255,.08)!important;
border-radius:18px!important;
padding:15px!important;
color:white!important;
transition:.3s;
}

.custom-input:focus{
border-color:#c084fc!important;

box-shadow:
0 0 15px rgba(192,132,252,.35)!important;

transform:scale(1.01);
}

.custom-input::placeholder{
color:#cbd5e1;
}

.form-label{
color:#f8fafc;
margin-bottom:10px;
}

textarea{
resize:none;
}

.custom-file{
background:rgba(255,255,255,.08)!important;
border:1px solid rgba(255,255,255,.08)!important;
border-radius:18px!important;
padding:14px!important;
color:white!important;
}

.texto-ayuda{
display:block;
margin-top:8px;
color:#cbd5e1;
}

.btn-guardar{
border:none;
border-radius:50px;
font-weight:600;
color:white;

background:
linear-gradient(135deg,#8b5cf6,#ec4899);

box-shadow:
0 0 25px rgba(236,72,153,.35);

transition:.3s;
}

.btn-guardar:hover{
transform:translateY(-4px) scale(1.04);

box-shadow:
0 0 30px rgba(236,72,153,.5),
0 0 45px rgba(139,92,246,.4);

color:white;
}

.btn-cancelar{
border-radius:50px;
font-weight:600;

border:1px solid rgba(255,255,255,.15);

background:rgba(255,255,255,.05);

color:white;

transition:.3s;
}

.btn-cancelar:hover{
background:rgba(255,255,255,.12);

transform:translateY(-3px);

color:white;
}

.alert-danger{
background:rgba(220,38,38,.12);
color:#fecaca;
backdrop-filter:blur(12px);
border:1px solid rgba(248,113,113,.2);
}

@media(max-width:768px){

.titulo-principal{
font-size:2.5rem;
}

.card-body{
padding:2rem!important;
}

}

</style>

@endsection