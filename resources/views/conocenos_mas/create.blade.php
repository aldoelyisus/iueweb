@extends('layout')

@section('title', 'Crear Conócenos Más')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Crear Conócenos Más</h1>
        <form action="{{ route('conocenos_mas.store') }}" method="POST" enctype="multipart/form-data" class="shadow p-4 rounded bg-light">
            @csrf
            <div class="form-group mb-3">
                <label for="mision">Misión</label>
                <textarea name="mision" id="mision" class="form-control" rows="3" placeholder="Escribe aquí la misión..." required></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="vision">Visión</label>
                <textarea name="vision" id="vision" class="form-control" rows="3" placeholder="Escribe aquí la visión..." required></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="valores">Valores</label>
                <textarea name="valores" id="valores" class="form-control" rows="3" placeholder="Escribe aquí los valores..." required></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="objetivo">Objetivo</label>
                <textarea name="objetivo" id="objetivo" class="form-control" rows="3" placeholder="Escribe aquí el objetivo..." required></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="img1">Imagen 1</label>
                <input type="file" name="img1" id="img1" class="form-control" accept="image/*">
            </div>
            <div class="form-group mb-3">
                <label for="img2">Imagen 2</label>
                <input type="file" name="img2" id="img2" class="form-control" accept="image/*">
            </div>
            <div class="form-group mb-3">
                <label for="img3">Imagen 3</label>
                <input type="file" name="img3" id="img3" class="form-control" accept="image/*">
            </div>
            <div class="form-group mb-3">
                <label for="img4">Imagen 4</label>
                <input type="file" name="img4" id="img4" class="form-control" accept="image/*">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
@endsection

@section('styles')
    <style>
        /* Estilos personalizados para el formulario */
        .container {
            max-width: 600px; /* Ajustar el ancho para pantallas grandes */
            margin: auto; /* Centrar el contenedor */
        }

        .form-group {
            display: flex; /* Usar flexbox para alinear los elementos */
            flex-direction: column; /* Colocar los elementos en columna */
        }

        label {
            margin-bottom: 5px; /* Espacio entre el label y el campo */
        }

        textarea {
            width: 100%; /* Ancho completo para el textarea */
            height: 60px; /* Altura fija para el textarea */
            resize: none; /* Deshabilitar el redimensionamiento */
            margin-top: 5px; /* Espacio entre el label y el campo */
        }

        input[type="file"] {
            margin-top: 5px; /* Espacio entre el label y el campo */
        }

        @media (max-width: 768px) {
            .container {
                width: 100%; /* Ajustar el ancho para pantallas pequeñas */
            }
        }
    </style>
@endsection
