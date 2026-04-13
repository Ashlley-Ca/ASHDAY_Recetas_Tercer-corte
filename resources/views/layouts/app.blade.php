<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>@yield('title') | ASHDAY Recetas</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Fuentes modernas -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Playfair+Display:wght@600&display=swap" rel="stylesheet">

<style>

/* ----------- VARIABLES ----------- */
:root{
--color-primary: #667eea;
--color-secondary: #764ba2;
--color-dark: #121212;
--color-light: #ffffff;
--color-text: #555;
}

/* ----------- BODY ----------- */
body{
background: linear-gradient(135deg, #fdfbfb, #ebedee);
font-family:'Poppins', sans-serif;
color:#444;
transition: .3s;
}

/* ----------- TIPOGRAFÍA ----------- */
h1,h2,h3{
font-family: 'Playfair Display', serif;
}

/* ----------- NAVBAR ----------- */
.navbar{
background: rgba(255,255,255,0.8);
backdrop-filter: blur(10px);
border-radius: 0 0 20px 20px;
box-shadow: 0 5px 20px rgba(0,0,0,0.05);
padding:12px 0;
}

.navbar-brand{
font-weight:700;
font-size:22px;
color:var(--color-primary) !important;
}

.nav-link{
font-weight:500;
margin-left:15px;
color:#555 !important;
transition:.3s;
}

.nav-link:hover{
color:var(--color-primary) !important;
transform:scale(1.05);
}

/* ----------- HERO ----------- */
.hero{
background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
color:white;
border-radius:20px;
padding:60px 20px;
box-shadow:0px 10px 30px rgba(0,0,0,0.1);
}

.hero h1{
font-size:40px;
font-weight:700;
}

.hero p{
opacity:0.9;
}

/* ----------- CONTENEDOR ----------- */
.container{
max-width:1200px;
position:relative;
}

/* decorativo */
.container::before{
content:"";
position:absolute;
width:200px;
height:200px;
background:rgba(102,126,234,0.15);
border-radius:50%;
top:-50px;
right:-50px;
z-index:-1;
}

/* ----------- TARJETAS ----------- */
.card{
border:none;
border-radius:20px;
overflow:hidden;
background:white;
box-shadow:0px 10px 30px rgba(0,0,0,0.08);
transition: all .4s ease;
}

.card:hover{
transform: translateY(-10px) scale(1.02);
box-shadow:0px 15px 40px rgba(0,0,0,0.15);
}

/* ----------- BOTONES ----------- */
.btn-receta{
background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
color:white;
border:none;
border-radius:30px;
padding:10px 20px;
font-weight:500;
transition:.3s;
}

.btn-receta:hover{
transform:scale(1.05);
}

/* ----------- FORMULARIOS ----------- */
input, select, textarea{
border-radius:12px !important;
padding:10px;
border:1px solid #ddd;
}

input:focus, textarea:focus{
border-color:var(--color-primary);
box-shadow:0 0 5px rgba(102,126,234,0.4);
}

/* ----------- FOOTER ----------- */
footer{
background:white;
border-top:1px solid #eee;
margin-top:60px;
padding:25px;
font-size:14px;
}

/* ----------- MODO OSCURO ----------- */
body.dark{
background:#121212;
color:#eee;
}

body.dark .navbar,
body.dark .card,
body.dark footer{
background:#1e1e1e;
color:white;
}

</style>

</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg">
<div class="container">

<a class="navbar-brand" href="{{ route('inicio') }}">
🍓 ASHDAY Recetas
</a>

<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="menu">

<ul class="navbar-nav ms-auto">

<li class="nav-item">
<a class="nav-link" href="{{ route('inicio') }}">Inicio</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ route('menu') }}">Recetas</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ route('videos') }}">Videos</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ route('nosotros') }}">Nosotros</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ route('contacto') }}">Contacto</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ route('mensajes') }}">Mensajes</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ route('recetas') }}">Recetas</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ route('recetas.crear') }}">Crear receta</a>
</li>

<!-- BOTÓN DARK MODE -->
<li class="nav-item">
<button onclick="toggleDark()" class="btn btn-receta ms-3">🌙</button>
</li>

</ul>

</div>

</div>
</nav>

<!-- HERO -->
<div class="container mt-4">
<div class="hero text-center mb-5">
    <h1>🍽️ Descubre recetas increíbles</h1>
    <p>Explora, crea y comparte tus platos favoritos</p>
</div>
</div>

<!-- CONTENIDO -->
<div class="container py-4">
@yield('content')
</div>

<!-- FOOTER -->
<footer class="text-center">
<p><strong>🍰 ASHDAY Recetas</strong></p>
<p>Proyecto académico - Programación Avanzada 2026</p>
<p>Creado por Ashlley Alejandra Castro y Dayana Liseth Cuaran</p>
</footer>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
function toggleDark(){
document.body.classList.toggle("dark");
}
</script>

</body>
</html>