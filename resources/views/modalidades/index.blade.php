@extends('layout')

@section('title', 'Modalidades')

@section('content')
    <h1>Modalidades</h1>
    <a href="{{ route('modalidades.create') }}" class="btn btn-primary mb-3">Añadir Modalidad</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($modalidades as $modalidad)
                <tr>
                    <td>{{ $modalidad->id }}</td>
                    <td>{{ $modalidad->nombre }}</td>
                    <td>{{ $modalidad->descripcion }}</td>
                    <td>
                        <a href="{{ route('modalidades.edit', $modalidad->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('modalidades.destroy', $modalidad->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection