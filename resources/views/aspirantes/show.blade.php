<!-- resources/views/aspirantes/show.blade.php -->
@extends('layout')

@section('content')
<div class="container">
    <h1>{{ $aspirante->nombrecompleto }}</h1>
    <p><strong>Edad:</strong> {{ $aspirante->edad }}</p>
    <p><strong>Teléfono:</strong> {{ $aspirante->telefono }}</p>
    <p><strong>Email:</strong> {{ $aspirante->email }}</p>
    <p><strong>Servicio de Interés:</strong> {{ $aspirante->servicio_interes }}</p>
    <a href="{{ route('aspirantes.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection