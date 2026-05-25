@extends('layouts.app')

@section('title', 'Editar categoría')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card">

            <h2 class="mb-4 text-gradient">
                ✏️ Editar Categoría
            </h2>

            <form action="{{ route('categorias.update', $categoria) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-4">

                    <label class="form-label">
                        Nombre
                    </label>

                    <input type="text"
                           name="nombre"
                           class="form-control"
                           value="{{ old('nombre', $categoria->nombre) }}">

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Descripción
                    </label>

                    <textarea name="descripcion"
                              rows="5"
                              class="form-control">{{ old('descripcion', $categoria->descripcion) }}</textarea>

                </div>

                <button class="btn btn-receta">

                    Actualizar categoría

                </button>

            </form>

        </div>

    </div>

</div>

@endsection