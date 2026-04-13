@extends('layouts.app')

@section('title', 'Nosotros')

@section('content')

<h2 class="text-center mb-4">👩‍🍳 Sobre ASHDAY Recetas</h2>

<p class="text-center fs-5">
En <strong>ASHDAY Recetas</strong> compartimos deliciosas ideas de cocina,
recetas fáciles y consejos gastronómicos para que cualquier persona pueda
disfrutar preparando platos increíbles desde casa.
</p>

<p class="text-center">
Nuestra página busca inspirar a los amantes de la cocina con contenido
didáctico, creativo y lleno de sabor.
</p>

<hr class="my-5">

<h3 class="text-center mb-4">📩 Formulario de PQRS</h3>

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card shadow-lg p-4">

            @if(session('success'))
                 <div class="alert alert-success">
                   {{ session('success') }}
                 </div>
            @endif

            <form action="{{ route('pqrs.store') }}" method="POST">
                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nombres</label>
                        <input type="text" name="nombres" class="form-control" placeholder="Ingresa tu nombre" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Apellidos</label>
                        <input type="text" name="apellidos" class="form-control" placeholder="Ingresa tu apellido" required>
                    </div>

                </div>

                <div class="mb-3">
                    <label class="form-label">Correo</label>
                    <input type="email" name="correo" class="form-control" placeholder="ejemplo@email.com" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tipo</label>
                    <select name="tipo" class="form-select" required>
                        <option value="Petición">Petición</option>
                        <option value="Queja">Queja</option>
                        <option value="Reclamo">Reclamo</option>
                        <option value="Sugerencia">Sugerencia</option>
                        <option value="Felicitación">Felicitación</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mensaje</label>
                    <textarea name="mensaje" class="form-control" rows="4" required></textarea>
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" name="terminos" value="1">
                    <label class="form-check-label">
                        Acepto los términos y condiciones
                    </label>
                </div>

                <button type="submit" class="btn btn-success w-100">
                    📤 Enviar mensaje
                </button>

            </form>

            <small class="text-muted mt-3 d-block text-center">
                Tu opinión es muy importante para mejorar nuestras recetas y contenido.
            </small>

        </div>
    </div>
</div>

<hr class="mt-5">

<div class="text-center">
    <h5>👩‍💻 Proyecto creado por</h5>
    <p><strong>Ashlley Alejandra Castro</strong></p>
    <p><strong>Dayana Liseth Cuaran</strong></p>
</div>

@endsection