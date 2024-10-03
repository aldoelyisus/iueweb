@extends('layout')

@section('title', 'Modalidades')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Modalidades</h1>
    <a href="{{ route('modalidades.create') }}" class="btn btn-primary mb-3">Añadir Modalidad</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Servicios</th>
                <th>Programas</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($modalidades as $modalidad)
                <tr>
                    <td>{{ $modalidad->id }}</td>
                    <td>{{ $modalidad->titulo }}</td>
                    <td>
                        @foreach($modalidad->servicios as $servicio)
                            <strong>Servicio:</strong> {{ $servicio->nombre }}<br>
                        @endforeach
                    </td>
                    <td>
                        @if($modalidad->programas->isEmpty())
                            <em>No asociado a un programa</em>
                        @else
                            @foreach($modalidad->programas as $programa)
                                <strong>Programa:</strong> {{ $programa->nombre }}<br>
                            @endforeach
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('modalidades.edit', $modalidad->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ route('modalidades.destroy', $modalidad->id) }}')">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Incluir SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmDelete(url) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "No podrás recuperar esta modalidad después de eliminarla.",
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
