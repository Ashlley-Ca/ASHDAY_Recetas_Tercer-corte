@extends('layouts.app')

@section('title', 'Crear categoría')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card">

            <h2 class="mb-4 text-gradient">
                ➕ Nueva Categoría
            </h2>

            <form action="{{ route('categorias.store') }}"
                  method="POST">

                @csrf

                <div class="mb-4">

                    <label class="form-label">
                        Nombre
                    </label>

                    <input type="text"
                           name="nombre"
                           class="form-control"
                           value="{{ old('nombre') }}">

                    @error('nombre')

                        <small class="text-danger">
                            {{ $message }}
                        </small>

                    @enderror

                </div>

                <div class="mb-4">

                    <label class="form-label">
                        Descripción
                    </label>

                    <textarea name="descripcion"
                              rows="5"
                              class="form-control">{{ old('descripcion') }}</textarea>

                    @error('descripcion')

                        <small class="text-danger">
                            {{ $message }}
                        </small>

                    @enderror

                </div>
                <div class="mb-4">

                    <label class="form-label">
                        Ícono Bootstrap
                    </label>

                    <input type="text"
                        name="icono"
                        class="form-control"
                        placeholder="Ejemplo: bi-cake2">

                </div>

                <div class="mb-4">

                    <label class="form-label">
                         URL Imagen
                         </label>

                        <input type="text"
                        name="imagen"
                        class="form-control"
                        placeholder="https://...">

                </div>

                <div class="mb-4">

                     <label class="form-label">
                     Color
                     </label>

                     <input type="color"
                      name="color"
                      class="form-control form-control-color">

                </div>

                <button class="btn btn-receta">

                    Guardar categoría

                </button>

            </form>

        </div>

    </div>

</div>

@endsection