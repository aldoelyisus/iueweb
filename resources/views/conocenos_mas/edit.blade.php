@extends('layout')

@section('title', 'Editar Conócenos Más')

@section('content')
    <h1>Editar Conócenos Más</h1>
    <form action="{{ route('conocenos_mas.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="mision">Misión</label>
            <textarea name="mision" id="mision" class="form-control" required>{{ $item->mision }}</textarea>
        </div>
        <div class="form-group">
            <label for="vision">Visión</label>
            <textarea name="vision" id="vision" class="form-control" required>{{ $item->vision }}</textarea>
        </div>
        <div class="form-group">
            <label for="valores">Valores</label>
            <textarea name="valores" id="valores" class="form-control" required>{{ $item->valores }}</textarea>
        </div>
        <div class="form-group">
            <label for="objetivo">Objetivo</label>
            <textarea name="objetivo" id="objetivo" class="form-control" required>{{ $item->objetivo }}</textarea>
        </div>
        <div class="form-group">
            <label for="img1">Imagen 1</label>
            <input type="file" name="img1" id="img1" class="form-control">
            @if($item->img1) <img src="{{ $item->img1 }}" width="100"> @endif
        </div>
        <div class="form-group">
            <label for="img2">Imagen 2</label>
            <input type="file" name="img2" id="img2" class="form-control">
            @if($item->img2) <img src="{{ $item->img2 }}" width="100"> @endif
        </div>
        <div class="form-group">
            <label for="img3">Imagen 3</label>
            <input type="file" name="img3" id="img3" class="form-control">
            @if($item->img3) <img src="{{ $item->img3 }}" width="100"> @endif
        </div>
        <div class="form-group">
            <label for="img4">Imagen 4</label>
            <input type="file" name="img4" id="img4" class="form-control">
            @if($item->img4) <img src="{{ $item->img4 }}" width="100"> @endif
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection