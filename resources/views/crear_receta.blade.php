@extends('layouts.app') 

@section('content')

<h2>Agregar Receta</h2>

<form action="{{ route('recetas.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="nombre" placeholder="Nombre" required><br>
    <input type="text" name="autor" placeholder="Autor" required><br>

    <select name="categoria" required>
        <option value="">Seleccione una categoría</option>
        <option value="Desayuno">Desayuno</option>
        <option value="Almuerzo">Almuerzo</option>
        <option value="Cena">Cena</option>
        <option value="Postre">Postre</option>
    </select><br>

    <textarea name="ingredientes" placeholder="Ingredientes" required></textarea><br>
    <textarea name="preparacion" placeholder="Preparación" required></textarea><br>

    <input type="number" name="tiempo" placeholder="Tiempo (min)" required><br>

    <select name="dificultad" required>
        <option value="">Seleccione dificultad</option>
        <option value="Fácil">Fácil</option>
        <option value="Media">Media</option>
        <option value="Difícil">Difícil</option>
    </select><br>

    <!-- Campo de imagen corregido -->
    <input type="file" name="imagen" accept="image/*"><br>

    <button type="submit">Guardar</button>

</form>

@endsection