<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Token CSRF: protege los formularios contra ataques de falsificación de solicitudes -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- @yield('title'): permite que cada vista hija defina su propio título de pestaña -->
    <title>@yield('title') | ASHDAY Recetas</title>

    <!-- ============================================================
         LIBRERÍAS EXTERNAS (CDN)
    ============================================================ -->

    <!-- Bootstrap 5: framework CSS para diseño responsivo y componentes UI -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts: tipografías Poppins (general) y Playfair Display (títulos) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons: librería de íconos SVG compatibles con Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- jQuery: requerido por DataTables para manipulación del DOM -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- DataTables: plugin para tablas interactivas con búsqueda, orden y paginación -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <script>
        // Inicializa DataTables sobre la tabla con id="tablaMensajes"
        // cuando el documento HTML haya cargado completamente
        $(document).ready(function() {

            $('#tablaMensajes').DataTable({
                language: {
                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
                }
            });

            $('#tablaCategorias').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
                }
            });
        });
    </script>

    <style>

        /* ========================================
           VARIABLES GLOBALES CSS
           Centralizan colores y sombras para
           reutilizarlos en todo el archivo
        ======================================== */

        :root {
            --primary: #8b5cf6;                          /* Color morado principal */
            --secondary: #ec4899;                        /* Color rosado secundario */
            --accent: #22d3ee;                           /* Color cian de acento */

            --bg-dark: #070b17;                          /* Fondo oscuro base */
            --bg-card: rgba(255, 255, 255, 0.06);        /* Fondo semitransparente para cards */

            --text: #f8fafc;                             /* Color de texto principal */
            --text-soft: #cbd5e1;                        /* Color de texto secundario/suave */

            --glass-border: rgba(255, 255, 255, 0.08);   /* Borde estilo glassmorphism */

            --shadow-purple: 0 0 40px rgba(139, 92, 246, .35);  /* Sombra morada */
            --shadow-pink: 0 0 40px rgba(236, 72, 153, .25);    /* Sombra rosada */
        }

        /* ========================================
           BODY
           Fondo con múltiples gradientes radiales
           y uno lineal para efecto de profundidad
        ======================================== */

        body {
            font-family: 'Poppins', sans-serif;

            /* Capas de gradiente superpuestas: radiales en esquinas + lineal de fondo */
            background:
                radial-gradient(circle at top left, rgba(139, 92, 246, .35), transparent 28%),
                radial-gradient(circle at bottom right, rgba(236, 72, 153, .30), transparent 30%),
                radial-gradient(circle at center, rgba(34, 211, 238, .12), transparent 35%),
                linear-gradient(135deg, #050816, #0b1120, #111827, #1e1b4b);

            color: var(--text);
            min-height: 100vh;
            overflow-x: hidden;    /* Evita scroll horizontal no deseado */
            position: relative;
        }

        /* ========================================
           EFECTOS DE FONDO ANIMADOS
           Usa pseudo-elementos ::before y ::after
           para crear orbes de luz flotantes
        ======================================== */

        body::before,
        body::after {
            content: "";
            position: fixed;          /* Se mantienen fijos al hacer scroll */
            width: 450px;
            height: 450px;
            border-radius: 50%;
            filter: blur(120px);      /* Desenfoque para efecto de brillo suave */
            opacity: .35;
            z-index: -1;              /* Se ubican detrás de todo el contenido */
            animation: float 10s ease-in-out infinite;
        }

        /* Orbe morado en esquina superior izquierda */
        body::before {
            background: #8b5cf6;
            top: -120px;
            left: -120px;
        }

        /* Orbe rosado en esquina inferior derecha */
        body::after {
            background: #ec4899;
            bottom: -150px;
            right: -120px;
            animation-delay: 5s;     /* Desfase para que los orbes no se muevan sincronizados */
        }

        /* Animación de flotación vertical suave */
        @keyframes float {
            0%   { transform: translateY(0px); }
            50%  { transform: translateY(25px); }
            100% { transform: translateY(0px); }
        }

        /* ========================================
           SCROLLBAR PERSONALIZADA
           Solo funciona en navegadores WebKit
           (Chrome, Edge, Safari)
        ======================================== */

        ::-webkit-scrollbar { width: 10px; }

        ::-webkit-scrollbar-track { background: #111827; }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(#8b5cf6, #ec4899);
            border-radius: 20px;
        }

        /* ========================================
           TIPOGRAFÍA
        ======================================== */

        /* Títulos usan Playfair Display para estilo editorial */
        h1, h2, h3, h4, h5 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
        }

        /* Clase utilitaria para texto con gradiente de color */
        .text-gradient {
            background: linear-gradient(90deg, #c084fc, #f472b6, #22d3ee);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* ========================================
           NAVBAR
           Barra de navegación fija con efecto
           glassmorphism (fondo translúcido + blur)
        ======================================== */

        .navbar {
            position: sticky;            /* Se queda pegada al tope al hacer scroll */
            top: 0;
            z-index: 1000;               /* Se mantiene por encima de todo el contenido */
            background: rgba(7, 11, 23, .75);
            backdrop-filter: blur(18px); /* Efecto de vidrio esmerilado */
            border-bottom: 1px solid rgba(255, 255, 255, .08);
            padding: 16px 0;
            box-shadow: 0 8px 30px rgba(0, 0, 0, .35);
        }

        .navbar-brand {
            font-size: 30px;
            font-weight: 700;
            background: linear-gradient(90deg, #c084fc, #f472b6, #22d3ee);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .navbar-toggler {
            border: none;
            background: rgba(255, 255, 255, .1);
        }

        .nav-link {
            color: var(--text-soft) !important;
            font-weight: 500;
            margin-left: 12px;
            position: relative;
            transition: .35s;
        }

        .nav-link:hover {
            color: white !important;
            transform: translateY(-2px);   /* Sube ligeramente al hacer hover */
        }

        /* Línea animada que aparece debajo del enlace al hacer hover */
        .nav-link::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -4px;
            width: 0%;
            height: 2px;
            background: linear-gradient(90deg, #8b5cf6, #ec4899);
            transition: .35s;
        }

        .nav-link:hover::after {
            width: 100%;   /* Se expande de izquierda a derecha al hacer hover */
        }
        /* ========================================
              NAVBAR SCROLL RESPONSIVE
            ======================================== */

            .navbar .navbar-collapse {

                overflow-x: auto;

                scrollbar-width: thin;

                scrollbar-color: #8b5cf6 transparent;
            }

            /* SCROLL PERSONALIZADO */

            .navbar .navbar-collapse::-webkit-scrollbar {

             height: 6px;
            }

            .navbar .navbar-collapse::-webkit-scrollbar-track {

              background: transparent;
            }

            .navbar .navbar-collapse::-webkit-scrollbar-thumb {

                background: linear-gradient(
                 90deg,
                 #8b5cf6,
                 #ec4899
                );

                 border-radius: 20px;
            }

                /* EVITA QUE LOS BOTONES BAJEN */

            .navbar-nav {

                 flex-wrap: nowrap !important;

                white-space: nowrap;
            }

        /* ========================================
           HERO PRINCIPAL
           Sección destacada en la parte superior
           con efecto glassmorphism
        ======================================== */

        .hero {
            position: relative;
            overflow: hidden;
            padding: 100px 50px;
            border-radius: 35px;
            background: linear-gradient(
                135deg,
                rgba(139, 92, 246, .28),
                rgba(236, 72, 153, .20),
                rgba(34, 211, 238, .12)
            );
            border: 1px solid rgba(255, 255, 255, .08);
            backdrop-filter: blur(22px);
            box-shadow: var(--shadow-purple), var(--shadow-pink);
        }

        /* Reflejo de luz decorativo en esquina superior derecha del hero */
        .hero::before {
            content: "";
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(255, 255, 255, .14), transparent 70%);
            top: -250px;
            right: -250px;
        }

        .hero h1 {
            font-size: 65px;
            margin-bottom: 20px;
            line-height: 1.1;
            color: white;
        }

        .hero p {
            font-size: 18px;
            max-width: 750px;
            margin: auto;
            color: #dbe4f0;
        }

        /* ========================================
           BOTONES
        ======================================== */

        .btn-receta {
            background: linear-gradient(135deg, #8b5cf6, #ec4899);
            border: none;
            padding: 14px 28px;
            border-radius: 50px;     /* Borde completamente redondeado (pill) */
            font-weight: 600;
            color: white;
            box-shadow: 0 0 25px rgba(236, 72, 153, .35);
            transition: .35s;
        }

        .btn-receta:hover {
            transform: translateY(-3px) scale(1.05);   /* Sube y escala al hacer hover */
            color: white;
            box-shadow:
                0 0 30px rgba(236, 72, 153, .45),
                0 0 50px rgba(139, 92, 246, .35);
        }

        /* ========================================
           CARDS
           Tarjetas con efecto glassmorphism
        ======================================== */

        .card {
            background: rgba(255, 255, 255, .05);
            border: 1px solid rgba(255, 255, 255, .08);
            backdrop-filter: blur(18px);
            border-radius: 28px;
            padding: 22px;
            color: white;
            overflow: hidden;
            position: relative;
            transition: .45s;
            box-shadow: 0 10px 35px rgba(0, 0, 0, .30);
        }

        /* Reflejo de luz decorativo en esquina superior derecha de cada card */
        .card::before {
            content: "";
            position: absolute;
            width: 250px;
            height: 250px;
            background: radial-gradient(circle, rgba(255, 255, 255, .12), transparent);
            top: -120px;
            right: -120px;
        }

        .card:hover {
            transform: translateY(-10px) scale(1.02);   /* Sube y escala al hacer hover */
            box-shadow:
                0 14px 45px rgba(0, 0, 0, .35),
                0 0 35px rgba(236, 72, 153, .18);
        }

        /* ========================================
           FORMULARIOS
           Inputs, textareas y selects estilizados
           con fondo translúcido y borde glassmorphism
        ======================================== */

        input,
        textarea,
        select {
            background: rgba(255, 255, 255, .06) !important;
            border: 1px solid rgba(255, 255, 255, .08) !important;
            border-radius: 18px !important;
            padding: 14px !important;
            color: white !important;
        }

        input::placeholder,
        textarea::placeholder {
            color: #cbd5e1;   /* Texto de placeholder en color suave */
        }

        /* Al enfocar un campo, resalta con color morado y sombra brillante */
        input:focus,
        textarea:focus,
        select:focus {
            border-color: #c084fc !important;
            box-shadow: 0 0 15px rgba(192, 132, 252, .35) !important;
        }

        /* ========================================
           TÍTULOS DE SECCIÓN
        ======================================== */

        .section-title {
            font-size: 42px;
            margin-bottom: 15px;
        }

        .section-subtitle {
            color: #cbd5e1;
            font-size: 17px;
        }

        /* ========================================
           FOOTER
        ======================================== */

        footer {
            margin-top: 100px;
            padding: 45px 20px;
            text-align: center;
            background: rgba(7, 11, 23, .70);
            border-top: 1px solid rgba(255, 255, 255, .08);
            backdrop-filter: blur(18px);
            color: #cbd5e1;
        }

        .footer-logo {
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 10px;
            background: linear-gradient(90deg, #c084fc, #f472b6, #22d3ee);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* ========================================
           RESPONSIVE
           Ajustes para pantallas menores a 992px
           (tablets y móviles)
        ======================================== */

        @media (max-width: 992px) {
            .hero { padding: 70px 25px; }
            .hero h1 { font-size: 42px; }
            .navbar-brand { font-size: 24px; }
        }

    </style>

</head>

<body>

    <!-- ============================================================
         NAVBAR
         Barra de navegación principal con menú responsivo
    ============================================================ -->

    <nav class="navbar navbar-expand-lg">

        <div class="container">

            <!-- Logo / Nombre del sitio con enlace a la página de inicio -->
            <a class="navbar-brand" href="{{ route('inicio') }}">
                🍓 ASHDAY Recetas
            </a>

            <!-- Botón hamburguesa: visible solo en pantallas pequeñas -->
            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menú colapsable -->
            <div class="collapse navbar-collapse" id="menu">

                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <!-- Enlaces públicos visibles para todos los usuarios -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('inicio') }}">
                            <i class="bi bi-house-door"></i> Inicio
                        </a>
                    </li>

                    <li class="nav-item">
                     <a class="nav-link" href="{{ route('menu') }}">
                        <i class="bi bi-grid-3x3-gap"></i> Menú
                     </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('videos') }}">
                            <i class="bi bi-play-circle"></i> Videos
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('nosotros') }}">
                            <i class="bi bi-people"></i> Nosotros
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contacto') }}">
                            <i class="bi bi-envelope"></i> Contacto
                        </a>
                    </li>

                    {{-- ==========================================
                         @guest: bloque visible solo para
                         usuarios NO autenticados (invitados)
                    ========================================== --}}
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="bi bi-box-arrow-in-right"></i> Login
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="bi bi-person-plus"></i> Registro
                            </a>
                        </li>
                    @endguest

                    {{-- ==========================================
                         @auth: bloque visible solo para
                         usuarios autenticados (con sesión activa)
                    ========================================== --}}
                    @auth
                        <li class="nav-item">

                         <a class="nav-link" href="{{ route('dashboard') }}">

                        <i class="bi bi-speedometer2"></i>
                         Dashboard

                         </a>

                        </li>

                         {{-- Mensajes PQRS --}}
                        <li class="nav-item">

                         <a class="nav-link" href="{{ route('mensajes.index') }}">

                         <i class="bi bi-chat-dots"></i>
                            Mensajes

                         </a>

                        </li>

                            {{-- Ver recetas --}}
                        <li class="nav-item">

                         <a class="nav-link" href="{{ route('recetas') }}">

                          <i class="bi bi-journal-richtext"></i>
                            Recetas

                         </a>

                        </li>

                            {{-- Crear receta --}}
                        <li class="nav-item">

                         <a class="nav-link" href="{{ route('recetas.crear') }}">

                            <i class="bi bi-plus-circle"></i>
                            Crear receta

                         </a>

                        </li>

                            {{-- Categorías --}}
                        <li class="nav-item">

                         <a class="nav-link" href="{{ route('categorias.index') }}">

                            <i class="bi bi-folder2-open"></i>
                                Categorías

                             </a>

                        </li>

                            {{-- Crear categoría --}}
                        <li class="nav-item">

                         <a class="nav-link" href="{{ route('categorias.create') }}">

                             <i class="bi bi-folder-plus"></i>
                            Crear categoría

                         </a>

                        </li>

                        <!-- Formulario de cierre de sesión -->
                        <!-- Se usa un formulario POST por seguridad (no GET)
                             y @csrf para proteger contra ataques CSRF -->
                        <li class="nav-item ms-lg-3">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-receta">
                                    <i class="bi bi-box-arrow-right"></i> Salir
                                </button>
                            </form>
                        </li>
                    @endauth

                </ul>

            </div>

        </div>

    </nav>

    <!-- ============================================================
         HERO
         Sección principal de bienvenida visible en todas las páginas
    ============================================================ -->

    <div class="container mt-5">

        <div class="hero text-center">

            <h1>
                ✨ Cocina con
                <span class="text-gradient">Creatividad</span>
            </h1>

            <p class="mt-4">
                Descubre recetas increíbles, comparte tus platos favoritos
                y vive una experiencia gastronómica moderna,
                visual y totalmente interactiva.
            </p>

            <div class="mt-5">
                <a href="{{ route('recetas') }}" class="btn btn-receta btn-lg px-5">
                    🍽️ Explorar recetas
                </a>
            </div>

        </div>

    </div>

    {{-- ============================================================
         HEADER OPCIONAL
         Solo se renderiza si la vista hija define una sección 'header'
         con @section('header') ... @endsection
    ============================================================ --}}

 @if(View::hasSection('header'))
    <div class="container mt-5">
        <div class="card">
            @yield('header')
        </div>
    </div>
@endif

    {{-- ============================================================
         CONTENIDO PRINCIPAL
         @yield('content'): espacio reservado donde cada vista hija
         inyecta su propio contenido con @section('content')
    ============================================================ --}}

<main class="container py-5">
    @yield('content')
</main>
    <!-- ============================================================
         FOOTER
    ============================================================ -->

    <footer>
        <div class="footer-logo">🍰 ASHDAY Recetas</div>
        <p class="mb-2">Proyecto académico - Programación Avanzada 2026</p>
        <p class="mb-0">Creado por Ashlley Alejandra Castro y Dayana Liseth Cuaran</p>
    </footer>

<!-- Bootstrap JS: necesario para componentes interactivos como el menú colapsable -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>