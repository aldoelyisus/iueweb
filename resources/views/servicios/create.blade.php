@extends('layout')

@section('title', 'Crear Servicio')

@section('content')
    <h1>Crear Servicio</h1>
    <form action="{{ route('servicios.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion"></textarea>
        
        <label for="requiere_programas">Requiere Programas:</label>
        <select name="requiere_programas" id="requiere_programas" required>
            <option value="1">Sí</option>
            <option value="0">No</option>
        </select>
        
        <button type="submit">Guardar</button>
    </form>
@endsection