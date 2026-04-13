<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PaginaController extends Controller
{
    public function inicio(): View
    {
        return view('inicio');
    }

    public function contacto(): View
    {
        return view('contacto');
    }

    public function mensajes(): View
    {
        return view('mensajes');
    }

    public function menu(): View
    {
        return view('menu');
    }

    public function nosotros(): View
    {
        return view('nosotros');
    }

    public function videos(): View
    {
        return view('videos');
    }
}