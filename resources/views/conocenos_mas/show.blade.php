@extends('layout')

@section('title', 'Detalles de Conócenos Más')

@section('content')
    <h1>Detalles de Conócenos Más</h1>
    <div class="form-group">
        <label>Misión</label>
        <p>{{ $item->mision }}</p>
    </div>
    <div class="form-group">
        <label>Visión</label>
        <p>{{ $item->vision }}</p>
    </div>
    <div class="form-group">
        <label>Valores</label>
        <p>{{ $item->valores }}</p>
    </div>
    <div class="form-group">
        <label>Objetivo</label>
        <p>{{ $item->objetivo }}</p>
    </div>
    <div class="form-group">
        <label>Imagen 1</label>
        @if($item->img1)
            <p>{{ $item->img1 }}</p> <!-- Imprime la URL de la imagen 1 -->
            <img src="{{ $item->img1 }}" width="200" alt="Imagen 1">
        @endif
    </div>
    <div class="form-group">
        <label>Imagen 2</label>
        @if($item->img2)
            <p>{{ $item->img2 }}</p> <!-- Imprime la URL de la imagen 2 -->
            <img src="{{ $item->img2 }}" width="200" alt="Imagen 2">
        @endif
    </div>
    <div class="form-group">
        <label>Imagen 3</label>
        @if($item->img3)
            <p>{{ $item->img3 }}</p> <!-- Imprime la URL de la imagen 3 -->
            <img src="{{ $item->img3 }}" width="200" alt="Imagen 3">
        @endif
    </div>
    <div class="form-group">
        <label>Imagen 4</label>
        @if($item->img4)
            <p>{{ $item->img4 }}</p> <!-- Imprime la URL de la imagen 4 -->
            <img src="{{ $item->img4 }}" width="200" alt="Imagen 4">
        @endif
    </div>
    <a href="{{ route('conocenos_mas.index') }}" class="btn btn-secondary">Volver</a>
@endsection