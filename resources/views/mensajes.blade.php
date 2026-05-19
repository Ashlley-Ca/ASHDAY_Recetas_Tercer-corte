{{-- Extiende el layout principal de la aplicación (layouts/app.blade.php) --}}
@extends('layouts.app')

{{-- Define el título de la pestaña del navegador --}}
@section('title', 'Mensajes')

{{-- ============================================================
     CONTENIDO PRINCIPAL
     Se inyecta en el @yield('content') del layout base
============================================================ --}}
@section('content')

<div class="container py-5">

    {{-- ============================================================
         HERO / ENCABEZADO
         Sección destacada con gradiente y efecto glassmorphism
         ::before en CSS agrega un reflejo decorativo de luz
    ============================================================ --}}
    <div class="mensajes-hero text-center mb-5">

        {{-- Badge decorativo del panel --}}
        <span class="hero-badge">📩 Panel de administración</span>

        <h1 class="display-4 fw-bold mt-4">
            Mensajes de la
            <span class="text-gradient">Comunidad</span>
        </h1>

        <p class="mt-3 fs-5 opacity-75">
            Gestiona los mensajes, sugerencias y solicitudes
            enviadas por los usuarios.
        </p>

    </div>

    {{-- ============================================================
         ALERTA DE ÉXITO
         session('success'): mensaje flash enviado desde el controlador
         tras completar una acción (editar, eliminar, etc.)
         Solo se muestra si existe la sesión 'success'
    ============================================================ --}}
    @if(session('success'))
        <div class="alert alert-custom-success mb-4">
            <i class="bi bi-check-circle-fill"></i>
            {{ session('success') }}
        </div>
    @endif

    {{-- ============================================================
         CONTENEDOR DE LA TABLA
         DataTables (inicializado en el layout) añade automáticamente:
         búsqueda, paginación y ordenamiento a #tablaMensajes
    ============================================================ --}}
    <div class="table-container">
        <div class="table-responsive">

            <table id="tablaMensajes" class="table custom-table align-middle">

                {{-- ENCABEZADO DE LA TABLA --}}
                <thead>
                    <tr>
                        <th>#</th>
                        <th>👤 Usuario</th>
                        <th>📧 Correo</th>
                        <th>📌 Tipo</th>
                        <th>💬 Mensaje</th>
                        <th class="text-center">⚙ Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    {{-- ============================================================
                         @forelse: itera sobre la colección $mensajes
                         Si está vacía, ejecuta el bloque @empty en lugar del @forelse
                    ============================================================ --}}
                    @forelse($mensajes as $men)

                        <tr>

                            {{-- COLUMNA: ID del mensaje con badge decorativo --}}
                            <td>
                                <span class="id-badge">#{{ $men->id }}</span>
                            </td>

                            {{-- COLUMNA: Nombre completo del remitente
                                 Avatar generado con la inicial del nombre (strtoupper + substr)
                                 strtoupper: convierte a mayúscula
                                 substr($men->nombres, 0, 1): toma el primer carácter --}}
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar-circle">
                                        {{ strtoupper(substr($men->nombres, 0, 1)) }}
                                    </div>
                                    <div>
                                        <strong>{{ $men->nombres }} {{ $men->apellidos }}</strong>
                                    </div>
                                </div>
                            </td>

                            {{-- COLUMNA: Correo electrónico del remitente --}}
                            <td>
                                <span class="correo-text">{{ $men->correo }}</span>
                            </td>

                            {{-- COLUMNA: Tipo de solicitud con badge de color dinámico
                                 El color del badge cambia según el tipo usando directivas Blade --}}
                            <td>
                                <span class="tipo-badge
                                    @if($men->tipo == 'Queja')      badge-danger
                                    @elseif($men->tipo == 'Petición') badge-primary
                                    @elseif($men->tipo == 'Sugerencia') badge-success
                                    @else badge-warning
                                    @endif">
                                    {{ $men->tipo }}
                                </span>
                            </td>

                            {{-- COLUMNA: Vista previa del mensaje
                                 Str::limit(): helper de Laravel que recorta el texto
                                 a 80 caracteres y agrega "..." al final si es más largo --}}
                            <td>
                                <div class="mensaje-box">
                                    {{ Str::limit($men->mensaje, 80) }}
                                </div>
                            </td>

                            {{-- COLUMNA: Botones de acción (Editar y Eliminar) --}}
                            <td>
                                <div class="d-flex justify-content-center gap-2 flex-wrap">

                                    {{-- Botón Editar: redirige al formulario de edición --}}
                                    <a href="{{ route('mensajes.edit', $men->id) }}"
                                       class="btn btn-edit">
                                        <i class="bi bi-pencil-square"></i> Editar
                                    </a>

                                    {{-- Botón Eliminar: usa formulario POST con @method('DELETE')
                                         porque HTML no soporta el verbo DELETE directamente
                                         onclick: solicita confirmación antes de eliminar --}}
                                    <form action="{{ route('mensajes.destroy', $men->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-delete"
                                                onclick="return confirm('¿Estás seguro de eliminar este mensaje? Esta acción no se puede deshacer.')">
                                            <i class="bi bi-trash3"></i> Eliminar
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>

                    {{-- ============================================================
                         @empty: se muestra cuando $mensajes está vacío
                         colspan="6": la celda abarca todas las columnas de la tabla
                    ============================================================ --}}
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state text-center py-5">
                                    <div class="empty-icon">📭</div>
                                    <h3 class="mt-4 fw-bold">No hay mensajes aún</h3>
                                    <p class="opacity-75">
                                        Cuando los usuarios envíen mensajes, aparecerán aquí.
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

{{-- ============================================================
     ESTILOS ESPECÍFICOS DE ESTA VISTA
     Se definen aquí para no afectar el resto de la aplicación
     Incluye estilos para: hero, tabla, badges, DataTables y responsive
============================================================ --}}
<style>

    /* ================================================
       HERO: sección de encabezado con glassmorphism
    ================================================ */

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

    /* Reflejo de luz decorativo en esquina superior derecha */
    .mensajes-hero::before {
        content: "";
        position: absolute;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(255, 255, 255, .12), transparent 70%);
        top: -250px;
        right: -200px;
    }

    /* ================================================
       TEXTO CON GRADIENTE
    ================================================ */

    .text-gradient {
        background: linear-gradient(90deg, #c084fc, #f472b6, #22d3ee);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* ================================================
       BADGE DEL HERO
    ================================================ */

    .hero-badge {
        display: inline-block;
        padding: 10px 18px;
        border-radius: 40px;
        background: rgba(255, 255, 255, .08);
        border: 1px solid rgba(255, 255, 255, .08);
        backdrop-filter: blur(12px);
        font-size: 14px;
        color: #e2e8f0;
    }

    /* ================================================
       ALERTA DE ÉXITO
    ================================================ */

    .alert-custom-success {
        background: rgba(34, 197, 94, .15);
        border: 1px solid rgba(34, 197, 94, .25);
        padding: 18px;
        border-radius: 18px;
        color: #d1fae5;
        backdrop-filter: blur(10px);
    }

    /* ================================================
       CONTENEDOR DE LA TABLA
    ================================================ */

    .table-container {
        background: rgba(255, 255, 255, .06);
        border: 1px solid rgba(255, 255, 255, .10);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        border-radius: 30px;
        padding: 20px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(0, 0, 0, .25);
    }

    /* ================================================
       TABLA PRINCIPAL
    ================================================ */

    .custom-table {
        margin: 0;
        color: #f8fafc;
    }

    /* Encabezado con fondo oscuro para mejor contraste */
    .custom-table thead {
        background: rgba(15, 23, 42, .85);
    }

    .custom-table thead th {
        border: none;
        padding: 20px;
        font-size: 15px;
        font-weight: 700;
        letter-spacing: .3px;
        color: #ffffff;
        text-transform: uppercase;
    }

    /* Filas con borde inferior sutil */
    .custom-table tbody tr {
        transition: .3s;
        border-bottom: 1px solid rgba(255, 255, 255, .06);
        background: rgba(255, 255, 255, .015);
    }

    /* Efecto hover: resalta la fila con color morado suave */
    .custom-table tbody tr:hover {
        background: rgba(139, 92, 246, .10);
        transform: scale(1.01);
    }

    .custom-table td {
        padding: 20px;
        vertical-align: middle;
        border: none;
        color: #f1f5f9;
    }

    /* ================================================
       BADGE DE ID
    ================================================ */

    .id-badge {
        padding: 8px 14px;
        border-radius: 20px;
        background: rgba(139, 92, 246, .20);
        color: #ddd6fe;
        font-weight: 600;
    }

    /* ================================================
       AVATAR CON INICIAL DEL NOMBRE
    ================================================ */

    .avatar-circle {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        background: linear-gradient(135deg, #8b5cf6, #ec4899);
        color: white;
        box-shadow: 0 0 15px rgba(236, 72, 153, .35);
    }

    /* ================================================
       CORREO
    ================================================ */

    .correo-text {
        color: #cbd5e1;
        font-size: 14px;
        font-weight: 500;
    }

    /* ================================================
       BADGES DE TIPO DE SOLICITUD
       Cada color representa un tipo diferente de PQRS
    ================================================ */

    .tipo-badge {
        padding: 10px 16px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        display: inline-block;
    }

    .badge-primary  { background: rgba(59, 130, 246, .18); color: #bfdbfe; }  /* Petición: azul */
    .badge-success  { background: rgba(34, 197, 94, .18);  color: #bbf7d0; }  /* Sugerencia: verde */
    .badge-warning  { background: rgba(251, 191, 36, .18); color: #fde68a; }  /* Otros: amarillo */
    .badge-danger   { background: rgba(239, 68, 68, .18);  color: #fecaca; }  /* Queja: rojo */

    /* ================================================
       VISTA PREVIA DEL MENSAJE
    ================================================ */

    .mensaje-box {
        max-width: 280px;
        color: #e2e8f0;
        line-height: 1.5;
        font-size: 14px;
    }

    /* ================================================
       BOTONES DE ACCIÓN
    ================================================ */

    .btn-edit,
    .btn-delete {
        border: none;
        padding: 10px 18px;
        border-radius: 30px;
        font-weight: 600;
        transition: .3s;
    }

    /* Botón Editar: azul translúcido */
    .btn-edit  { background: rgba(59, 130, 246, .18); color: #bfdbfe; }
    .btn-edit:hover {
        background: rgba(59, 130, 246, .30);
        color: white;
        transform: translateY(-2px);
    }

    /* Botón Eliminar: rojo translúcido */
    .btn-delete { background: rgba(239, 68, 68, .18); color: #fecaca; }
    .btn-delete:hover {
        background: rgba(239, 68, 68, .30);
        color: white;
        transform: translateY(-2px);
    }

    /* ================================================
       ESTADO VACÍO (sin mensajes)
    ================================================ */

    .empty-state { padding: 40px; }
    .empty-state h3 { color: #ffffff; }
    .empty-state p  { color: #cbd5e1; }

    .empty-icon {
        font-size: 80px;
        filter: drop-shadow(0 0 20px rgba(236, 72, 153, .30));
    }

    /* ================================================
       DATATABLES: estilos para integrar el plugin
       con el diseño oscuro de la aplicación
    ================================================ */

    /* Textos de información, labels y filtros */
    .dataTables_wrapper,
    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter,
    .dataTables_wrapper label {
        color: #e2e8f0 !important;
        font-weight: 500;
    }

    /* Inputs de búsqueda y select de cantidad de registros */
    .dataTables_wrapper .dataTables_filter input,
    .dataTables_wrapper .dataTables_length select {
        background: rgba(255, 255, 255, .06) !important;
        border: 1px solid rgba(255, 255, 255, .10) !important;
        color: #ffffff !important;
        border-radius: 12px !important;
        padding: 6px 10px !important;
    }

    /* Opciones del select de cantidad de registros */
    .dataTables_wrapper .dataTables_length select option {
        background: #0f172a;
        color: #ffffff;
    }

    /* Botones de paginación */
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        color: #e2e8f0 !important;
        border-radius: 10px !important;
        margin: 0 2px;
    }

    /* Botón de página activa con gradiente morado-rosado */
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: linear-gradient(135deg, #8b5cf6, #ec4899) !important;
        border: none !important;
        color: #ffffff !important;
    }

    /* Hover en botones de paginación */
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: rgba(139, 92, 246, .15) !important;
        border: none !important;
        color: #ffffff !important;
    }

    /* Elimina el fondo blanco alternado que DataTables aplica por defecto */
    table.dataTable,
    table.dataTable tbody,
    table.dataTable thead { background: transparent !important; color: #f8fafc !important; }

    table.dataTable.stripe > tbody > tr.odd > *,
    table.dataTable.display > tbody > tr.odd > *,
    table.dataTable.stripe > tbody > tr.even > *,
    table.dataTable.display > tbody > tr.even > * {
        background-color: transparent !important;
        box-shadow: none !important;
        color: #f8fafc !important;
    }

    /* Fuerza fondo transparente en filas y celdas de DataTables */
    #tablaMensajes tbody,
    #tablaMensajes tbody tr,
    #tablaMensajes tbody td { background: transparent !important; color: #f8fafc !important; }

    #tablaMensajes thead,
    #tablaMensajes thead tr,
    #tablaMensajes thead th { background: rgba(15, 23, 42, .85) !important; color: #ffffff !important; }

    #tablaMensajes tbody tr:hover { background: rgba(139, 92, 246, .10) !important; }

    /* ================================================
       RESPONSIVE: ajustes para pantallas < 768px
    ================================================ */

    @media (max-width: 768px) {
        .custom-table td,
        .custom-table th { padding: 14px; }
        .mensaje-box { max-width: 180px; }
    }

</style>

@endsection