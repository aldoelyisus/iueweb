@extends('layout')

@section('title', 'Programas')

@section('content')
    <h1>Programas</h1>
    <a href="{{ route('programas.create') }}">Crear Programa</a>
    <ul>
        @foreach($programas as $programa)
            <li>
                <a href="{{ route('programas.show', $programa->id) }}">{{ $programa->nombre }}</a>
                <a href="{{ route('programas.edit', $programa->id) }}">Editar</a>
                <form action="{{ route('programas.destroy', $programa->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection