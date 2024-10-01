@extends('layout')

@section('title', 'Servicios')

@section('content')
    <h1>Servicios</h1>
    <a href="{{ route('servicios.create') }}">Crear Servicio</a>
    <ul>
        @foreach ($servicios as $servicio)
            <li>
                <a href="{{ route('servicios.show', $servicio->id) }}">{{ $servicio->nombre }}</a>
                <a href="{{ route('servicios.edit', $servicio->id) }}">Editar</a>
                <form action="{{ route('servicios.destroy', $servicio->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection