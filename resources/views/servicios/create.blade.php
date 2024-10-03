@extends('layout')

@section('title', 'Crear Servicio')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Crear Servicio</h1>
    <form action="{{ route('servicios.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingresa el nombre del servicio" required>
        </div>
        
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="4" cols="30" placeholder="Ingresa una descripción del servicio"></textarea>
        </div>
        
        <div class="form-group">
            <label for="requiere_programas">Requiere Programas:</label>
            <select name="requiere_programas" id="requiere_programas" class="form-control" required>
                <option value="" disabled selected>Seleccione una opción</option>
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary btn-block mt-4">Guardar</button>
    </form>
    
    <div class="text-center mt-3">
        <a href="{{ route('servicios.index') }}" class="btn btn-secondary">Volver a la lista de servicios</a>
    </div>
</div>
@endsection
