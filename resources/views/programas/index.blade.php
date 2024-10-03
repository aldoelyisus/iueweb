@extends('layout')

@section('title', 'Programas')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Programas</h1>
    <div class="mb-3">
        <a href="{{ route('programas.create') }}" class="btn btn-primary">Crear Programa</a>
    </div>
    
    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    title: '¡Éxito!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonText: 'Aceptar',
                    customClass: {
                        confirmButton: 'btn btn-primary'
                    }
                });
            });
        </script>
    @endif

    <ul class="list-group">
        @foreach($programas as $programa)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('programas.show', $programa->id) }}" class="text-decoration-none">{{ $programa->nombre }}</a>
                <div>
                    <a href="{{ route('programas.edit', $programa->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ route('programas.destroy', $programa->id) }}')">Eliminar</button>
                </div>
            </li>
        @endforeach
    </ul>
</div>

<!-- Incluir SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmDelete(url) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "No podrás recuperar este programa después de eliminarlo.",
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
