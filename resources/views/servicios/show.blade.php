@extends('layout')

@section('title', 'Crear Servicio')

@section('content')
    <h1>{{ $servicio->nombre }}</h1>
    <p>{{ $servicio->descripcion }}</p>
    <a href="{{ route('servicios.edit', $servicio->id) }}">Editar</a>
    <form action="{{ route('servicios.destroy', $servicio->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
@endsection