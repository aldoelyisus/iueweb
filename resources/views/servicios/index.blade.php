@extends('layout')

@section('title', 'Servicios')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Servicios</h1>
    
    <div class="mb-3 text-right">
        <a href="{{ route('servicios.create') }}" class="btn btn-success">Crear Servicio</a>
    </div>

    <div class="list-group">
        @foreach ($servicios as $servicio)
            <div class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('servicios.show', $servicio->id) }}" class="text-decoration-none">{{ $servicio->nombre }}</a>
                <div>
                    <a href="{{ route('servicios.edit', $servicio->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ route('servicios.destroy', $servicio->id) }}')">Eliminar</button>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Incluir SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmDelete(url) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "No podrás recuperar este servicio después de eliminarlo.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar',
            customClass: {
                confirmButton: 'btn btn-danger',
                cancelButton: 'btn btn-secondary'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Si el usuario confirma, se redirige a la URL de eliminación
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = url;
                form.innerHTML = `
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                `;
                document.body.appendChild(form);
                form.submit();
            }
        });
    }
</script>
@endsection
