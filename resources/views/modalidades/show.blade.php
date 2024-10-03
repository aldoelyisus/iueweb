@extends('layout.app')

@section('content')
    <h1>{{ $modalidad->nombre }}</h1>
    <p>{{ $modalidad->descripcion }}</p>
    <a href="{{ route('modalidades.edit', $modalidad->id) }}">Editar</a>
    <form action="{{ route('modalidades.destroy', $modalidad->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
@endsection