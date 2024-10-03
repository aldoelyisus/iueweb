@extends('layout')

@section('title', 'Editar Programa')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Editar Programa</h1>

    <form action="{{ route('programas.update', $programa->id) }}" method="POST" class="bg-white p-4 rounded shadow-lg">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ $programa->nombre }}" class="form-control" required placeholder="Ingresa el nombre del programa">
        </div>
        
        <div class="mb-4">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="4" placeholder="Descripción del programa" required>{{ $programa->descripcion }}</textarea>
        </div>
        
        <div class="mb-4">
            <label for="servicio_id" class="form-label">Seleccionar Servicios:</label>
            <div class="border p-2 rounded" style="min-height: 100px;">
                @foreach($servicios as $servicio)
                    <div class="form-check">
                        <input type="checkbox" name="servicio_id[]" id="servicio_{{ $servicio->id }}" value="{{ $servicio->id }}" 
                        {{ $programa->servicios->contains($servicio->id) ? 'checked' : '' }} class="form-check-input">
                        <label for="servicio_{{ $servicio->id }}" class="form-check-label">
                            {{ $servicio->nombre }}
                        </label>
                    </div>
                @endforeach
            </div>
            <small class="form-text text-muted">Selecciona uno o más servicios.</small>
        </div>
        
        <button type="submit" class="btn btn-success w-100">Actualizar Programa</button>
    </form>
</div>

<!-- Incluir SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Alerta de éxito al guardar -->
@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                title: '¡Éxito!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'Aceptar',
                background: '#f8f9fa',
                color: '#333',
                showCloseButton: true,
            });
        });
    </script>
@endif
@endsection
