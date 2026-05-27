<x-guest-layout>

<style>

    body{

        font-family:'Poppins', sans-serif;

        background:
            radial-gradient(circle at top left, rgba(139,92,246,.35), transparent 28%),
            radial-gradient(circle at bottom right, rgba(236,72,153,.30), transparent 30%),
            radial-gradient(circle at center, rgba(34,211,238,.12), transparent 35%),
            linear-gradient(135deg, #050816, #0b1120, #111827, #1e1b4b);

        min-height:100vh;

        display:flex;
        justify-content:center;
        align-items:center;

        overflow-x:hidden;
    }

    .register-card{

        width:470px;

        background: rgba(255,255,255,.05);

        border:1px solid rgba(255,255,255,.08);

        backdrop-filter: blur(18px);

        border-radius:32px;

        padding:38px;

        position:relative;

        overflow:hidden;

        box-shadow:
            0 10px 35px rgba(0,0,0,.30),
            0 0 35px rgba(236,72,153,.18);

        animation: aparecer 1s ease;
    }

    .register-card::before{

        content:"";

        position:absolute;

        width:250px;
        height:250px;

        background: radial-gradient(
            circle,
            rgba(255,255,255,.12),
            transparent
        );

        top:-120px;
        right:-120px;
    }

    .top-brand{

        text-align:center;

        margin-bottom:25px;
    }

    .brand-icon{

        width:85px;
        height:85px;

        margin:auto;

        border-radius:50%;

        display:flex;
        justify-content:center;
        align-items:center;

        background: linear-gradient(
            135deg,
            #8b5cf6,
            #ec4899,
            #22d3ee
        );

        box-shadow:
            0 0 25px rgba(139,92,246,.45),
            0 0 45px rgba(236,72,153,.30);

        animation: glow 3s ease-in-out infinite;

        margin-bottom:18px;
    }

    .brand-icon i{

        color:white;
        font-size:36px;
    }

    .brand-title{

        font-size:34px;
        font-weight:700;

        background: linear-gradient(
            90deg,
            #c084fc,
            #f472b6,
            #22d3ee
        );

        -webkit-background-clip:text;
        -webkit-text-fill-color:transparent;

        letter-spacing:3px;
    }

    .brand-subtitle{

        color:#cbd5e1;

        font-size:12px;

        letter-spacing:8px;

        margin-top:4px;
    }

    .titulo{

        text-align:center;

        color:white;

        font-size:30px;
        font-weight:700;

        margin-top:25px;
        margin-bottom:10px;
    }

    .subtitulo{

        text-align:center;

        color:#cbd5e1;

        margin-bottom:30px;
    }

    label{

        color:white;

        margin-bottom:8px;

        display:block;

        font-weight:500;
    }

    .input-register{

        width:100%;

        background: rgba(255,255,255,.06);

        border:1px solid rgba(255,255,255,.08);

        border-radius:18px;

        padding:15px;

        color:white;

        margin-bottom:22px;

        transition:.3s;
    }

    .input-register::placeholder{

        color:#cbd5e1;
    }

    .input-register:focus{

        outline:none;

        border-color:#c084fc;

        box-shadow:
            0 0 15px rgba(192,132,252,.35);
    }

    .btn-register{

        width:100%;

        background: linear-gradient(
            135deg,
            #8b5cf6,
            #ec4899
        );

        border:none;

        padding:15px;

        border-radius:50px;

        color:white;

        font-weight:600;

        font-size:15px;

        transition:.35s;
    }

    .btn-register:hover{

        transform:translateY(-3px) scale(1.02);

        box-shadow:
            0 0 30px rgba(236,72,153,.45),
            0 0 50px rgba(139,92,246,.35);
    }

    .extra-links{

        text-align:center;

        margin-top:25px;
    }

    .extra-links a{

        color:#22d3ee;

        text-decoration:none;

        transition:.3s;
    }

    .extra-links a:hover{

        color:white;
    }

    @keyframes glow{

        0%{
            transform:scale(1);
        }

        50%{
            transform:scale(1.06);
        }

        100%{
            transform:scale(1);
        }

    }

    @keyframes aparecer{

        from{
            opacity:0;
            transform:translateY(30px);
        }

        to{
            opacity:1;
            transform:translateY(0);
        }

    }

</style>

<div class="register-card">

    <div class="top-brand">

        <div class="brand-icon">
            <i class="bi bi-fire"></i>
        </div>

        <div class="brand-title">
            ASHDAY
        </div>

        <div class="brand-subtitle">
            RECETAS
        </div>

    </div>

    <div class="titulo">
        Crear Cuenta
    </div>

    <div class="subtitulo">
        Únete a la experiencia ASHDAY
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <label>Nombre</label>

        <input
            type="text"
            name="name"
            class="input-register"
            placeholder="Ingresa tu nombre"
            required
        >

        <label>Correo Electrónico</label>

        <input
            type="email"
            name="email"
            class="input-register"
            placeholder="Ingresa tu correo"
            required
        >

        <label>Contraseña</label>

        <input
            type="password"
            name="password"
            class="input-register"
            placeholder="Crea una contraseña"
            required
        >

        <label>Confirmar Contraseña</label>

        <input
            type="password"
            name="password_confirmation"
            class="input-register"
            placeholder="Confirma tu contraseña"
            required
        >

        <button type="submit" class="btn-register">
            Crear Cuenta
        </button>

        <div class="extra-links">

            <a href="{{ route('login') }}">
                ¿Ya tienes cuenta? Iniciar sesión
            </a>

        </div>

    </form>

</div>

</x-guest-layout>