@extends('layout')

@section('title', 'Crear Programa')

@section('content')
    <h1>Crear Programa</h1>
    <form action="{{ route('programas.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion"></textarea>
        
        <label for="servicio_id">Servicio:</label>
        <select name="servicio_id" id="servicio_id" required>
            @foreach($servicios as $servicio)
                <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
            @endforeach
        </select>
        
        <button type="submit">Guardar</button>
    </form>
@endsection