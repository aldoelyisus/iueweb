<!-- resources/views/aspirantes/create.blade.php -->
@extends('layout')

@section('content')
<div class="container">
    <h1>Nuevo Aspirante</h1>
    <form action="{{ route('aspirantes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombrecompleto">Nombre Completo</label>
            <input type="text" name="nombrecompleto" id="nombrecompleto" class="form-control" value="{{ old('nombrecompleto') }}">
        </div>
        <div class="form-group">
            <label for="edad">Edad</label>
            <input type="number" name="edad" id="edad" class="form-control" value="{{ old('edad') }}">
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono') }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="servicio_id">Servicio de Interés</label>
            <select name="servicio_id" id="servicio_id" class="form-control">
                <option value="">Seleccione un servicio</option>
                @foreach($servicios as $servicio)
                    <option value="{{ $servicio->id }}" data-requiere-programas="{{ $servicio->requiere_programas }}">
                        {{ $servicio->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group" id="programas-container" style="display: none;">
            <label for="programa_id">Programa de Interés</label>
            <select name="programa_id" id="programa_id" class="form-control">
                <!-- Opciones de programas se llenarán dinámicamente -->
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const servicioSelect = document.getElementById('servicio_id');
        const programasContainer = document.getElementById('programas-container');
        const programaSelect = document.getElementById('programa_id');

        servicioSelect.addEventListener('change', function () {
            const selectedOption = servicioSelect.options[servicioSelect.selectedIndex];
            const requiereProgramas = selectedOption.getAttribute('data-requiere-programas') === '1';

            if (requiereProgramas) {
                fetch(`/servicios/${selectedOption.value}/programas`)
                    .then(response => response.json())
                    .then(data => {
                        programaSelect.innerHTML = '';
                        data.forEach(programa => {
                            const option = document.createElement('option');
                            option.value = programa.id;
                            option.textContent = programa.nombre;
                            programaSelect.appendChild(option);
                        });
                        programasContainer.style.display = 'block';
                    });
            } else {
                programasContainer.style.display = 'none';
            }
        });
    });
</script>
@endsection