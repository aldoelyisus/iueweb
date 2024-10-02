<!-- resources/views/aspirantes/index.blade.php -->
@extends('layout')

@section('content')
<div class="container">
    <h1>Aspirantes</h1>
    <a href="{{ route('aspirantes.create') }}" class="btn btn-primary">Nuevo Aspirante</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre Completo</th>
                <th>Edad</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Servicio de Interés</th>
                <th>Programa de Interés</th>
                <th style="width: 200px;">Acciones</th> <!-- Ajusta el ancho aquí -->
            </tr>
        </thead>
        <tbody>
            @foreach($aspirantes as $aspirante)
            <tr>
                <td>
                    <a href="{{ route('aspirantes.show', $aspirante->id) }}">
                        {{ $aspirante->nombrecompleto }}
                    </a>
                </td>
                <td>{{ $aspirante->edad }}</td>
                <td>{{ $aspirante->telefono }}</td>
                <td>{{ $aspirante->email }}</td>
                <td>{{ $aspirante->nombre_servicio }}</td>
                <td>{{ $aspirante->nombre_programa }}</td>
                <td>
                    <a href="{{ route('aspirantes.edit', $aspirante->id) }}" class="btn btn-warning btn-small">Editar</a>
                    <form action="{{ route('aspirantes.destroy', $aspirante->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-small">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection