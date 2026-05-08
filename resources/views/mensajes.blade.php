```php id="c1v8mj"
@extends('layouts.app')

@section('title', 'Mensajes')

@section('content')

<div class="container py-5">

    <!-- HEADER -->

    <div class="mensajes-hero text-center mb-5">

        <span class="hero-badge">
            📩 Panel de administración
        </span>

        <h1 class="display-4 fw-bold mt-4">
            Mensajes de la
            <span class="text-gradient">
                Comunidad
            </span>
        </h1>

        <p class="mt-3 fs-5 opacity-75">
            Gestiona los mensajes, sugerencias y solicitudes
            enviadas por los usuarios.
        </p>

    </div>

    <!-- ALERTAS -->

    @if(session('success'))

    <div class="alert alert-custom-success mb-4">

        <i class="bi bi-check-circle-fill"></i>

        {{ session('success') }}

    </div>

    @endif

    <!-- TABLA -->

    <div class="table-container">

        <div class="table-responsive">

            <table class="table custom-table align-middle">

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

                    @forelse($mensajes as $men)

                    <tr>

                        <!-- ID -->

                        <td>

                            <span class="id-badge">
                                #{{ $men->id }}
                            </span>

                        </td>

                        <!-- NOMBRE -->

                        <td>

                            <div class="d-flex align-items-center gap-3">

                                <div class="avatar-circle">

                                    {{ strtoupper(substr($men->nombres,0,1)) }}

                                </div>

                                <div>

                                    <strong>
                                        {{ $men->nombres }}
                                        {{ $men->apellidos }}
                                    </strong>

                                </div>

                            </div>

                        </td>

                        <!-- CORREO -->

                        <td>

                            <span class="correo-text">
                                {{ $men->correo }}
                            </span>

                        </td>

                        <!-- TIPO -->

                        <td>

                            <span class="tipo-badge
                                @if($men->tipo == 'Queja') badge-danger
                                @elseif($men->tipo == 'Petición') badge-primary
                                @elseif($men->tipo == 'Sugerencia') badge-success
                                @else badge-warning
                                @endif">

                                {{ $men->tipo }}

                            </span>

                        </td>

                        <!-- MENSAJE -->

                        <td>

                            <div class="mensaje-box">

                                {{ Str::limit($men->mensaje, 80) }}

                            </div>

                        </td>

                        <!-- ACCIONES -->

                        <td>

                            <div class="d-flex justify-content-center gap-2 flex-wrap">

                                <!-- EDITAR -->

                                <a href="{{ route('mensajes.edit', $men->id) }}"
                                   class="btn btn-edit">

                                    <i class="bi bi-pencil-square"></i>

                                    Editar

                                </a>

                                <!-- ELIMINAR -->

                                <form action="{{ route('mensajes.destroy', $men->id) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-delete"
                                            onclick="return confirm('¿Eliminar este mensaje?')">

                                        <i class="bi bi-trash3"></i>

                                        Eliminar

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <!-- VACÍO -->

                    <tr>

                        <td colspan="6">

                            <div class="empty-state text-center py-5">

                                <div class="empty-icon">
                                    📭
                                </div>

                                <h3 class="mt-4 fw-bold">
                                    No hay mensajes aún
                                </h3>

                                <p class="opacity-75">
                                    Cuando los usuarios envíen mensajes,
                                    aparecerán aquí.
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

<!-- ESTILOS -->

<style>

/* HERO */

.mensajes-hero{

padding:70px 30px;

border-radius:35px;

background:
linear-gradient(
135deg,
rgba(139,92,246,.18),
rgba(236,72,153,.14),
rgba(34,211,238,.10)
);

border:1px solid rgba(255,255,255,.08);

backdrop-filter:blur(20px);

box-shadow:
0 0 35px rgba(139,92,246,.20);

position:relative;

overflow:hidden;

}

.mensajes-hero::before{

content:"";

position:absolute;

width:500px;
height:500px;

background:
radial-gradient(circle,
rgba(255,255,255,.12),
transparent 70%);

top:-250px;
right:-200px;

}

/* TEXT */

.text-gradient{

background:
linear-gradient(
90deg,
#c084fc,
#f472b6,
#22d3ee
);

-webkit-background-clip:text;
-webkit-text-fill-color:transparent;

}

/* BADGE HERO */

.hero-badge{

display:inline-block;

padding:10px 18px;

border-radius:40px;

background:
rgba(255,255,255,.08);

border:
1px solid rgba(255,255,255,.08);

backdrop-filter:blur(12px);

font-size:14px;

color:#e2e8f0;

}

/* ALERT */

.alert-custom-success{

background:
rgba(34,197,94,.15);

border:
1px solid rgba(34,197,94,.25);

padding:18px;

border-radius:18px;

color:#d1fae5;

backdrop-filter:blur(10px);

}

/* TABLE CONTAINER */

.table-container{

background:
rgba(255,255,255,.05);

border:
1px solid rgba(255,255,255,.08);

backdrop-filter:blur(18px);

border-radius:30px;

padding:20px;

overflow:hidden;

box-shadow:
0 8px 30px rgba(0,0,0,.25);

}

/* TABLE */

.custom-table{

margin:0;

color:white;

}

.custom-table thead{

background:
rgba(255,255,255,.08);

}

.custom-table thead th{

border:none;

padding:20px;

font-size:15px;

font-weight:600;

color:#f8fafc;

}

.custom-table tbody tr{

transition:.3s;

border-bottom:
1px solid rgba(255,255,255,.05);

}

.custom-table tbody tr:hover{

background:
rgba(255,255,255,.04);

transform:scale(1.01);

}

.custom-table td{

padding:20px;

vertical-align:middle;

border:none;

}

/* ID */

.id-badge{

padding:8px 14px;

border-radius:20px;

background:
rgba(139,92,246,.20);

color:#ddd6fe;

font-weight:600;

}

/* AVATAR */

.avatar-circle{

width:48px;
height:48px;

border-radius:50%;

display:flex;
align-items:center;
justify-content:center;

font-weight:bold;

background:
linear-gradient(
135deg,
#8b5cf6,
#ec4899
);

color:white;

box-shadow:
0 0 15px rgba(236,72,153,.35);

}

/* CORREO */

.correo-text{

color:#cbd5e1;

font-size:14px;

}

/* BADGES */

.tipo-badge{

padding:10px 16px;

border-radius:20px;

font-size:13px;

font-weight:600;

display:inline-block;

}

.badge-primary{

background:
rgba(59,130,246,.18);

color:#bfdbfe;

}

.badge-success{

background:
rgba(34,197,94,.18);

color:#bbf7d0;

}

.badge-warning{

background:
rgba(251,191,36,.18);

color:#fde68a;

}

.badge-danger{

background:
rgba(239,68,68,.18);

color:#fecaca;

}

/* MENSAJE */

.mensaje-box{

max-width:280px;

color:#e2e8f0;

line-height:1.5;

}

/* BOTONES */

.btn-edit,
.btn-delete{

border:none;

padding:10px 18px;

border-radius:30px;

font-weight:600;

transition:.3s;

}

.btn-edit{

background:
rgba(59,130,246,.18);

color:#bfdbfe;

}

.btn-edit:hover{

background:
rgba(59,130,246,.30);

color:white;

transform:translateY(-2px);

}

.btn-delete{

background:
rgba(239,68,68,.18);

color:#fecaca;

}

.btn-delete:hover{

background:
rgba(239,68,68,.30);

color:white;

transform:translateY(-2px);

}

/* EMPTY */

.empty-state{

padding:40px;

}

.empty-icon{

font-size:80px;

filter:
drop-shadow(0 0 20px rgba(236,72,153,.30));

}

/* RESPONSIVE */

@media(max-width:768px){

.custom-table td,
.custom-table th{

padding:14px;

}

.mensaje-box{

max-width:180px;

}

}

</style>

@endsection
```
