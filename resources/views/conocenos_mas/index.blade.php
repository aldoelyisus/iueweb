@extends('layout')

@section('title', 'Conócenos Más - Listado')

@section('content')
    <h1>Conócenos Más</h1>
    <a href="{{ route('conocenos_mas.create') }}" class="btn btn-primary">Crear Nuevo</a>
    <table class="table table-rounded mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Misión</th>
                <th>Visión</th>
                <th>Valores</th>
                <th>Objetivo</th>
                <th>Imágenes</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->mision }}</td>
                    <td>{{ $item->vision }}</td>
                    <td>{{ $item->valores }}</td>
                    <td>{{ $item->objetivo }}</td>
                    <td>
                        @if($item->img1) <img src="{{ $item->img1 }}" width="50"> @endif
                        @if($item->img2) <img src="{{ $item->img2 }}" width="50"> @endif
                        @if($item->img3) <img src="{{ $item->img3 }}" width="50"> @endif
                        @if($item->img4) <img src="{{ $item->img4 }}" width="50"> @endif
                    </td>
                    <td>
                        <a href="{{ route('conocenos_mas.show', $item->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('conocenos_mas.edit', $item->id) }}" class="btn btn-warning">Editar</a>
                        <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ route('conocenos_mas.destroy', $item->id) }}')">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Incluye SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

    <script>
        function confirmDelete(url) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "No podrás recuperar este elemento después de eliminarlo.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarlo!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirige a la URL para eliminar el item
                    document.location.href = url;
                }
            });
        }
    </script>
@endsection
