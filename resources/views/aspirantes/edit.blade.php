<!-- resources/views/aspirantes/edit.blade.php -->
@extends('layout')

@section('content')
<div class="container">
    <h1>Editar Aspirante</h1>
    <form action="{{ route('aspirantes.update', $aspirante->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombrecompleto">Nombre Completo</label>
            <input type="text" name="nombrecompleto" id="nombrecompleto" class="form-control" value="{{ old('nombrecompleto', $aspirante->nombrecompleto) }}">
        </div>
        <div class="form-group">
            <label for="edad">Edad</label>
            <input type="number" name="edad" id="edad" class="form-control" value="{{ old('edad', $aspirante->edad) }}">
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono', $aspirante->telefono) }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $aspirante->email) }}">
        </div>
        <div class="form-group">
            <label for="servicio_id">Servicio de Interés</label>
            <select name="servicio_id" id="servicio_id" class="form-control">
                <option value="">Seleccione un servicio</option>
                @foreach($servicios as $servicio)
                    <option value="{{ $servicio->id }}" data-requiere-programas="{{ $servicio->requiere_programas }}" {{ (old('servicio_id', $aspirante->servicio_id) == $servicio->id) ? 'selected' : '' }}>
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
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const servicioSelect = document.getElementById('servicio_id');
        const programasContainer = document.getElementById('programas-container');
        const programaSelect = document.getElementById('programa_id');

        function loadProgramas(servicioId, selectedProgramaId = null) {
            fetch(`/servicios/${servicioId}/programas`)
                .then(response => response.json())
                .then(data => {
                    programaSelect.innerHTML = '';
                    data.forEach(programa => {
                        const option = document.createElement('option');
                        option.value = programa.id;
                        option.textContent = programa.nombre;
                        if (selectedProgramaId && selectedProgramaId == programa.id) {
                            option.selected = true;
                        }
                        programaSelect.appendChild(option);
                    });
                    programasContainer.style.display = 'block';
                });
        }

        servicioSelect.addEventListener('change', function () {
            const selectedOption = servicioSelect.options[servicioSelect.selectedIndex];
            const requiereProgramas = selectedOption.getAttribute('data-requiere-programas') === '1';

            if (requiereProgramas) {
                loadProgramas(selectedOption.value);
            } else {
                programasContainer.style.display = 'none';
            }
        });

        // Load programas if editing an existing aspirante
        const initialServicioId = servicioSelect.value;
        if (initialServicioId) {
            const selectedOption = servicioSelect.options[servicioSelect.selectedIndex];
            const requiereProgramas = selectedOption.getAttribute('data-requiere-programas') === '1';
            if (requiereProgramas) {
                loadProgramas(initialServicioId, '{{ $aspirante->programa_id ?? '' }}');
            }
        }
    });
</script>
@endsection