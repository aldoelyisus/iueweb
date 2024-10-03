@extends('layout')

@section('title', 'Detalles del Servicio')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">{{ $servicio->nombre }}</h1>
    <p class="text-center mb-4" style="font-size: 1.2rem;">{{ $servicio->descripcion }}</p>
    
    <div class="text-center mb-4">
        <a href="{{ route('servicios.edit', $servicio->id) }}" class="btn btn-primary btn-lg">Editar</a>
    </div>
    
    <!-- Formulario oculto para eliminar el servicio -->
    <form id="delete-form" action="{{ route('servicios.destroy', $servicio->id) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
    
    <!-- Botón que llama a la función confirmDelete -->
    <div class="text-center mb-4">
        <button type="button" class="btn btn-danger btn-lg" onclick="confirmDelete()">Eliminar</button>
    </div>
</div>

<!-- Incluir SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete() {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Esta acción no se puede deshacer.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminarlo',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Si el usuario confirma, enviar el formulario
                document.getElementById('delete-form').submit();
            }
        });
    }
</script>

@endsection
