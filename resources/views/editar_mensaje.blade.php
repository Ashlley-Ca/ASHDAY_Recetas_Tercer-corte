@extends('layouts.app')

@section('title','Editar Mensaje')

@section('content')

<div class="container py-5">

    {{-- ENCABEZADO --}}
    <div class="text-center mb-5">

        <span class="badge rounded-pill px-4 py-2 mb-3 titulo-badge">
            ✨ Gestión de PQRS
        </span>

        <h1 class="display-5 fw-bold titulo-principal">
            ✏️ Editar Mensaje
        </h1>

        <p class="texto-secundario">
            Actualiza la información del mensaje recibido
            de manera rápida y sencilla.
        </p>

    </div>

    {{-- ERRORES --}}
    @if($errors->any())

        <div class="alert alert-danger border-0 shadow-lg rounded-4 mb-4">

            <h5 class="fw-bold mb-3">
                ⚠️ Se encontraron algunos errores
            </h5>

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    {{-- TARJETA FORMULARIO --}}
    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="card border-0 shadow-lg rounded-5 glass-card overflow-hidden">

                {{-- HEADER --}}
                <div class="card-header border-0 text-center py-4 formulario-header">

                    <h2 class="fw-bold mb-2">
                        📝 Información del Mensaje
                    </h2>

                    <p class="mb-0 opacity-75">
                        Modifica los datos necesarios y guarda los cambios.
                    </p>

                </div>

                {{-- BODY --}}
                <div class="card-body p-5">

                    <form action="{{ route('mensajes.update',$mensaje->id) }}"
                          method="POST">

                        @csrf
                        @method('PUT')

                        {{-- NOMBRES Y APELLIDOS --}}
                        <div class="row">

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">
                                    👤 Nombres
                                </label>

                                <input type="text"
                                       name="nombres"
                                       class="form-control form-control-lg custom-input"
                                       value="{{ $mensaje->nombres }}"
                                       placeholder="Ingresa los nombres">

                            </div>

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">
                                    👥 Apellidos
                                </label>

                                <input type="text"
                                       name="apellidos"
                                       class="form-control form-control-lg custom-input"
                                       value="{{ $mensaje->apellidos }}"
                                       placeholder="Ingresa los apellidos">

                            </div>

                        </div>

                        {{-- CORREO --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                📧 Correo Electrónico
                            </label>

                            <input type="email"
                                   name="correo"
                                   class="form-control form-control-lg custom-input"
                                   value="{{ $mensaje->correo }}"
                                   placeholder="ejemplo@email.com">

                        </div>

                        {{-- TIPO --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                📌 Tipo de Solicitud
                            </label>

                            <select name="tipo"
                                    class="form-select form-select-lg custom-input">

                                <option value="Queja"
                                    {{ $mensaje->tipo == 'Queja' ? 'selected' : '' }}>
                                    😕 Queja
                                </option>

                                <option value="Petición"
                                    {{ $mensaje->tipo == 'Petición' ? 'selected' : '' }}>
                                    📩 Petición
                                </option>

                                <option value="Reclamo"
                                    {{ $mensaje->tipo == 'Reclamo' ? 'selected' : '' }}>
                                    ⚠️ Reclamo
                                </option>

                                <option value="Sugerencia"
                                    {{ $mensaje->tipo == 'Sugerencia' ? 'selected' : '' }}>
                                    💡 Sugerencia
                                </option>

                                <option value="Felicitación"
                                    {{ $mensaje->tipo == 'Felicitación' ? 'selected' : '' }}>
                                    🎉 Felicitación
                                </option>

                            </select>

                        </div>

                        {{-- MENSAJE --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                💬 Mensaje
                            </label>

                            <textarea name="mensaje"
                                      class="form-control custom-input"
                                      rows="6"
                                      placeholder="Escribe el mensaje aquí...">{{ $mensaje->mensaje }}</textarea>

                        </div>

                        {{-- CHECK --}}
                        <div class="form-check custom-check mb-5">

                            <input type="checkbox"
                                   name="acepto"
                                   class="form-check-input"
                                   id="acepto"

                                   {{ $mensaje->acepto ? 'checked' : '' }}>

                            <label class="form-check-label" for="acepto">

                                ✅ Acepto los términos y condiciones

                            </label>

                        </div>

                        {{-- BOTONES --}}
                        <div class="d-flex flex-wrap gap-3 justify-content-center">

                            <button class="btn btn-actualizar px-5 py-3">

                                🚀 Actualizar Mensaje

                            </button>

                            <a href="{{ route('mensajes') }}"
                               class="btn btn-volver px-5 py-3">

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
}

.glass-card{
background:rgba(255,255,255,.08);
backdrop-filter:blur(18px);
border:1px solid rgba(255,255,255,.08);
box-shadow:
0 0 25px rgba(139,92,246,.15),
0 0 45px rgba(236,72,153,.08);
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
}

.custom-check{
background:rgba(255,255,255,.05);
padding:15px 20px;
border-radius:15px;
border:1px solid rgba(255,255,255,.05);
}

.custom-check label{
color:#e2e8f0;
}

.btn-actualizar{
border:none;
border-radius:50px;
font-weight:600;
color:white;
background:linear-gradient(135deg,#8b5cf6,#ec4899);
box-shadow:0 0 25px rgba(236,72,153,.35);
transition:.3s;
}

.btn-actualizar:hover{
transform:translateY(-4px) scale(1.04);
box-shadow:
0 0 30px rgba(236,72,153,.5),
0 0 45px rgba(139,92,246,.4);
color:white;
}

.btn-volver{
border-radius:50px;
font-weight:600;
border:1px solid rgba(255,255,255,.15);
background:rgba(255,255,255,.05);
color:white;
transition:.3s;
}

.btn-volver:hover{
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

textarea{
resize:none;
}

@media(max-width:768px){

.titulo-principal{
font-size:2.4rem;
}

.card-body{
padding:2rem!important;
}

}

</style>

@endsection