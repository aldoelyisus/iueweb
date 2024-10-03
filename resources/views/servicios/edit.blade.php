@extends('layout')

@section('title', 'Editar Servicio')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Editar Servicio</h1>

    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    title: '¡Éxito!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                });
            });
        </script>
    @endif

    <form action="{{ route('servicios.update', $servicio->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $servicio->nombre) }}" class="form-control" placeholder="Ingresa el nombre del servicio" required>
        </div>
        
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="4" cols="30" placeholder="Ingresa una descripción del servicio" required>{{ old('descripcion', $servicio->descripcion) }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="requiere_programas">Requiere Programas:</label>
            <select name="requiere_programas" id="requiere_programas" class="form-control" required>
                <option value="" disabled selected>Seleccione una opción</option>
                <option value="1" {{ $servicio->requiere_programas ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ !$servicio->requiere_programas ? 'selected' : '' }}>No</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-warning btn-block mt-4">Actualizar</button>
    </form>
    
    <div class="text-center mt-3">
        <a href="{{ route('servicios.index') }}" class="btn btn-secondary">Volver a la lista de servicios</a>
    </div>
</div>

<!-- Incluir SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
