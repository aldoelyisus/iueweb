@extends('layout')

@section('title', 'Crear Conócenos Más')

@section('content')
    <h1>Crear Conócenos Más</h1>
    <form action="{{ route('conocenos_mas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="mision">Misión</label>
            <textarea name="mision" id="mision" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="vision">Visión</label>
            <textarea name="vision" id="vision" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="valores">Valores</label>
            <textarea name="valores" id="valores" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="objetivo">Objetivo</label>
            <textarea name="objetivo" id="objetivo" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="img1">Imagen 1</label>
            <input type="file" name="img1" id="img1" class="form-control">
        </div>
        <div class="form-group">
            <label for="img2">Imagen 2</label>
            <input type="file" name="img2" id="img2" class="form-control">
        </div>
        <div class="form-group">
            <label for="img3">Imagen 3</label>
            <input type="file" name="img3" id="img3" class="form-control">
        </div>
        <div class="form-group">
            <label for="img4">Imagen 4</label>
            <input type="file" name="img4" id="img4" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection