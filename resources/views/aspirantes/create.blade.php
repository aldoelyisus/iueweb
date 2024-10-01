<!-- resources/views/aspirantes/create.blade.php -->
@extends('layout')

@section('content')
<div class="container">
    <h1>Nuevo Aspirante</h1>
    <form action="{{ route('aspirantes.store') }}" method="POST">
        @csrf
        @include('aspirantes.form', ['servicios' => $servicios])
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