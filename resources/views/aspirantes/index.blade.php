<!-- resources/views/aspirantes/index.blade.php -->
@extends('layout')

@section('content')
<div class="container">
    <h1>Aspirantes</h1>
    <a href="{{ route('aspirantes.create') }}" class="btn btn-primary">Nuevo Aspirante</a>

    <div class="mb-4">
        <div class="form-row">
            <div class="col">
                <input type="text" id="nombrecompleto" class="form-control" placeholder="Nombre" value="{{ request('nombrecompleto') }}">
            </div>
            <div class="col">
                <select id="nombre_servicio" class="form-control">
                    <option value="">Seleccione un servicio</option>
                    @foreach($servicios as $servicio)
                        <option value="{{ $servicio->nombre }}" {{ request('nombre_servicio') == $servicio->nombre ? 'selected' : '' }}>
                            {{ $servicio->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <select id="nombre_programa" class="form-control">
                    <option value="">Seleccione un programa</option>
                    @foreach($programas as $programa)
                        <option value="{{ $programa->nombre }}" {{ request('nombre_programa') == $programa->nombre ? 'selected' : '' }}>
                            {{ $programa->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre Completo</th>
                <th>Edad</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Servicio de Interés</th>
                <th>Programa de Interés</th>
                <th style="width: 200px;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aspirantes as $aspirante)
            <tr>
                <td>
                    <a href="{{ route('aspirantes.show', $aspirante->id) }}">
                        {{ $aspirante->nombrecompleto }}
                    </a>
                </td>
                <td>{{ $aspirante->edad }}</td>
                <td>{{ $aspirante->telefono }}</td>
                <td>{{ $aspirante->email }}</td>
                <td>{{ $aspirante->nombre_servicio }}</td>
                <td>{{ $aspirante->nombre_programa }}</td>
                <td>
                    <a href="{{ route('aspirantes.edit', $aspirante->id) }}" class="btn btn-warning btn-small">Editar</a>
                    <form action="{{ route('aspirantes.destroy', $aspirante->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-small">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const nombreInput = document.getElementById('nombrecompleto');
        const servicioSelect = document.getElementById('nombre_servicio');
        const programaSelect = document.getElementById('nombre_programa');

        function applyFilters() {
            const nombre = nombreInput.value;
            const servicio = servicioSelect.value;
            const programa = programaSelect.value;

            const params = new URLSearchParams();
            if (nombre) params.append('nombrecompleto', nombre);
            if (servicio) params.append('nombre_servicio', servicio);
            if (programa) params.append('nombre_programa', programa);

            window.location.search = params.toString();
        }

        nombreInput.addEventListener('keypress', function (event) {
            if (event.key === 'Enter') {
                applyFilters();
            }
        });

        servicioSelect.addEventListener('change', applyFilters);
        programaSelect.addEventListener('change', applyFilters);
    });
</script>
@endsection