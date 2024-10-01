@extends('layout')

@section('title', 'Editar Servicio')

@section('content')
    <h1>Editar Servicio</h1>
    <form action="{{ route('servicios.update', $servicio->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="{{ $servicio->nombre }}" required>
        
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion">{{ $servicio->descripcion }}</textarea>
        
        <label for="requiere_programas">Requiere Programas:</label>
        <select name="requiere_programas" id="requiere_programas" required>
            <option value="1" {{ $servicio->requiere_programas ? 'selected' : '' }}>Sí</option>
            <option value="0" {{ !$servicio->requiere_programas ? 'selected' : '' }}>No</option>
        </select>
        
        <button type="submit">Actualizar</button>
    </form>
@endsection