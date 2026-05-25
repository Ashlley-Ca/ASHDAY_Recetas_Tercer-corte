{{-- Extiende el layout principal --}}
@extends('layouts.app')

{{-- Título --}}
@section('title', 'Categorías')

@section('content')

<div class="container py-5">

    {{-- HERO --}}
    <div class="mensajes-hero text-center mb-5">

        <span class="hero-badge">
            📂 Administración de categorías
        </span>

        <h1 class="display-4 fw-bold mt-4">
            Categorías de
            <span class="text-gradient">Recetas</span>
        </h1>

        <p class="mt-3 fs-5 opacity-75">
            Organiza las recetas por categorías para
            mejorar la experiencia de los usuarios.
        </p>

        <div class="mt-4">

            <a href="{{ route('categorias.create') }}"
               class="btn btn-receta">

                <i class="bi bi-plus-circle"></i>
                Nueva categoría

            </a>

        </div>

    </div>

    {{-- ALERTA --}}
    @if(session('success'))

        <div class="alert alert-custom-success mb-4">

            <i class="bi bi-check-circle-fill"></i>

            {{ session('success') }}

        </div>

    @endif

    {{-- TABLA --}}
    <div class="table-container">

        <div class="table-responsive">

            <table id="tablaMensajes"
                   class="table custom-table align-middle">

                <thead>

                    <tr>

                        <th>#</th>

                        <th>
                            📂 Categoría
                        </th>

                        <th>
                            📝 Descripción
                        </th>

                        <th class="text-center">
                            ⚙ Acciones
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($categorias as $categoria)

                        <tr>

                            {{-- ID --}}
                            <td>

                                <span class="id-badge">

                                    #{{ $categoria->id }}

                                </span>

                            </td>

                            {{-- CATEGORÍA --}}
                            <td>

                                <div class="d-flex align-items-center gap-3">

                                    <div class="avatar-circle">

                                        <i class="bi bi-folder-fill"></i>

                                    </div>

                                    <div>

                                        <strong>

                                            {{ $categoria->nombre }}

                                        </strong>

                                    </div>

                                </div>

                            </td>

                            {{-- DESCRIPCIÓN --}}
                            <td>

                                <div class="mensaje-box">

                                    {{ Str::limit($categoria->descripcion, 90) }}

                                </div>

                            </td>

                            {{-- ACCIONES --}}
                            <td>

                                <div class="d-flex justify-content-center gap-2 flex-wrap">

                                    {{-- EDITAR --}}
                                    <a href="{{ route('categorias.edit', $categoria->id) }}"
                                       class="btn btn-edit">

                                        <i class="bi bi-pencil-square"></i>

                                        Editar

                                    </a>

                                    {{-- ELIMINAR --}}
                                    <form action="{{ route('categorias.destroy', $categoria->id) }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-delete"

                                                onclick="return confirm('¿Eliminar esta categoría?')">

                                            <i class="bi bi-trash3"></i>

                                            Eliminar

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4">

                                <div class="empty-state text-center py-5">

                                    <div class="empty-icon">

                                        📂

                                    </div>

                                    <h3 class="mt-4 fw-bold">

                                        No hay categorías

                                    </h3>

                                    <p class="opacity-75">

                                        Crea la primera categoría para organizar las recetas.

                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

{{-- ESTILOS --}}
<style>

    .mensajes-hero {
        padding: 70px 30px;
        border-radius: 35px;
        background: linear-gradient(
            135deg,
            rgba(139, 92, 246, .18),
            rgba(236, 72, 153, .14),
            rgba(34, 211, 238, .10)
        );
        border: 1px solid rgba(255, 255, 255, .08);
        backdrop-filter: blur(20px);
        box-shadow: 0 0 35px rgba(139, 92, 246, .20);
        position: relative;
        overflow: hidden;
    }

    .mensajes-hero::before {
        content: "";
        position: absolute;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(255,255,255,.12), transparent 70%);
        top: -250px;
        right: -200px;
    }

    .text-gradient {
        background: linear-gradient(90deg, #c084fc, #f472b6, #22d3ee);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .hero-badge {
        display: inline-block;
        padding: 10px 18px;
        border-radius: 40px;
        background: rgba(255,255,255,.08);
        border: 1px solid rgba(255,255,255,.08);
        backdrop-filter: blur(12px);
        font-size: 14px;
        color: #e2e8f0;
    }

    .alert-custom-success {
        background: rgba(34,197,94,.15);
        border: 1px solid rgba(34,197,94,.25);
        padding: 18px;
        border-radius: 18px;
        color: #d1fae5;
        backdrop-filter: blur(10px);
    }

    .table-container {
        background: rgba(255,255,255,.06);
        border: 1px solid rgba(255,255,255,.10);
        backdrop-filter: blur(18px);
        border-radius: 30px;
        padding: 20px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(0,0,0,.25);
    }

    .custom-table {
        margin: 0;
        color: #f8fafc;
    }

    .custom-table thead {
        background: rgba(15,23,42,.85);
    }

    .custom-table thead th {
        border: none;
        padding: 20px;
        font-size: 15px;
        font-weight: 700;
        color: white;
        text-transform: uppercase;
    }

    .custom-table tbody tr {
        transition: .3s;
        border-bottom: 1px solid rgba(255,255,255,.06);
        background: rgba(255,255,255,.015);
    }

    .custom-table tbody tr:hover {
        background: rgba(139,92,246,.10);
        transform: scale(1.01);
    }

    .custom-table td {
        padding: 20px;
        vertical-align: middle;
        border: none;
    }

    .id-badge {
        padding: 8px 14px;
        border-radius: 20px;
        background: rgba(139,92,246,.20);
        color: #ddd6fe;
        font-weight: 600;
    }

    .avatar-circle {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        background: linear-gradient(135deg,#8b5cf6,#ec4899);
        color: white;
        box-shadow: 0 0 15px rgba(236,72,153,.35);
    }

    .mensaje-box {
        max-width: 350px;
        color: #e2e8f0;
        line-height: 1.5;
        font-size: 14px;
    }

    .btn-edit,
    .btn-delete {
        border: none;
        padding: 10px 18px;
        border-radius: 30px;
        font-weight: 600;
        transition: .3s;
    }

    .btn-edit {
        background: rgba(59,130,246,.18);
        color: #bfdbfe;
    }

    .btn-edit:hover {
        background: rgba(59,130,246,.30);
        color: white;
        transform: translateY(-2px);
    }

    .btn-delete {
        background: rgba(239,68,68,.18);
        color: #fecaca;
    }

    .btn-delete:hover {
        background: rgba(239,68,68,.30);
        color: white;
        transform: translateY(-2px);
    }

    /* ================================================
   DATATABLES DARK MODE
   Fuerza estilos oscuros igual que mensajes
================================================ */

.dataTables_wrapper,
.dataTables_wrapper .dataTables_info,
.dataTables_wrapper .dataTables_length,
.dataTables_wrapper .dataTables_filter,
.dataTables_wrapper label {
    color: #e2e8f0 !important;
    font-weight: 500;
}

/* INPUT BUSCADOR */
.dataTables_wrapper .dataTables_filter input,
.dataTables_wrapper .dataTables_length select {

    background: rgba(255,255,255,.06) !important;

    border: 1px solid rgba(255,255,255,.10) !important;

    color: #ffffff !important;

    border-radius: 12px !important;

    padding: 6px 10px !important;
}

/* OPCIONES SELECT */
.dataTables_wrapper .dataTables_length select option {

    background: #0f172a;

    color: #ffffff;
}

/* PAGINACIÓN */
.dataTables_wrapper .dataTables_paginate .paginate_button {

    color: #e2e8f0 !important;

    border-radius: 10px !important;

    margin: 0 2px;
}

/* BOTÓN ACTIVO */
.dataTables_wrapper .dataTables_paginate .paginate_button.current {

    background: linear-gradient(
        135deg,
        #8b5cf6,
        #ec4899
    ) !important;

    border: none !important;

    color: white !important;
}

/* HOVER PAGINACIÓN */
.dataTables_wrapper .dataTables_paginate .paginate_button:hover {

    background: rgba(139,92,246,.15) !important;

    border: none !important;

    color: white !important;
}

/* ================================================
   ELIMINA LOS COLORES BLANCOS DEFAULT
================================================ */

table.dataTable,
table.dataTable tbody,
table.dataTable thead {

    background: transparent !important;

    color: #f8fafc !important;
}

/* FILAS */
table.dataTable.stripe > tbody > tr.odd > *,
table.dataTable.display > tbody > tr.odd > *,
table.dataTable.stripe > tbody > tr.even > *,
table.dataTable.display > tbody > tr.even > * {

    background-color: transparent !important;

    box-shadow: none !important;

    color: #f8fafc !important;
}

/* TEXTO DE CELDAS */
#tablaMensajes tbody,
#tablaMensajes tbody tr,
#tablaMensajes tbody td {

    background: transparent !important;

    color: #f8fafc !important;
}

/* ENCABEZADO */
#tablaMensajes thead,
#tablaMensajes thead tr,
#tablaMensajes thead th {

    background: rgba(15,23,42,.85) !important;

    color: #ffffff !important;
}

/* HOVER */
#tablaMensajes tbody tr:hover {

    background: rgba(139,92,246,.10) !important;
}

</style>

@endsection