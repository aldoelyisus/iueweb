@extends('layout')

@section('title', 'Editar Programa')

@section('content')
    <h1>Editar Programa</h1>
    <form action="{{ route('programas.update', $programa->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="{{ $programa->nombre }}" required>
        
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion">{{ $programa->descripcion }}</textarea>
        
        <label for="servicio_id">Servicio:</label>
        <select name="servicio_id[]" id="servicio_id" multiple required>
            @foreach($servicios as $servicio)
                <option value="{{ $servicio->id }}" {{ $programa->servicios->contains($servicio->id) ? 'selected' : '' }}>
                    {{ $servicio->nombre }}
                </option>
            @endforeach
        </select>
        
        <button type="submit">Actualizar</button>
    </form>
@endsection