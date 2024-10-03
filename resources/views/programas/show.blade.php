@extends('layout')

@section('title', 'Detalles del Programa')

@section('content')
    <h1>{{ $programa->nombre }}</h1>
    <p>{{ $programa->descripcion }}</p>
    
    <h2>Servicios</h2>
    <ul>
        @foreach($programa->servicios as $servicio)
            <li>{{ $servicio->nombre }}</li>
        @endforeach
    </ul>
    
    <a href="{{ route('programas.edit', $programa->id) }}">Editar</a>
    <form action="{{ route('programas.destroy', $programa->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
@endsection