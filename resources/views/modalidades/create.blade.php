@extends('layout')

@section('title', 'Crear Modalidad')

@section('content')
    <h1>Crear Modalidad</h1>
    <form action="{{ route('modalidades.store') }}" method="POST">
        @csrf
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" required>
        
        <label for="subtitulo">Subtítulo:</label>
        <input type="text" name="subtitulo" id="subtitulo">
        
        <label for="titulo_perfil_ingreso">Título Perfil Ingreso:</label>
        <input type="text" name="titulo_perfil_ingreso" id="titulo_perfil_ingreso">
        
        <label for="desc_perfil_ingreso">Descripción Perfil Ingreso:</label>
        <textarea name="desc_perfil_ingreso" id="desc_perfil_ingreso"></textarea>
        
        <label for="link_img_perfil_ingreso">Link Imagen Perfil Ingreso:</label>
        <input type="text" name="link_img_perfil_ingreso" id="link_img_perfil_ingreso">
        
        <label for="titulo_perfil_egreso">Título Perfil Egreso:</label>
        <input type="text" name="titulo_perfil_egreso" id="titulo_perfil_egreso">
        
        <label for="desc_perfil_egreso">Descripción Perfil Egreso:</label>
        <textarea name="desc_perfil_egreso" id="desc_perfil_egreso"></textarea>
        
        <label for="link_img_perfil_egreso">Link Imagen Perfil Egreso:</label>
        <input type="text" name="link_img_perfil_egreso" id="link_img_perfil_egreso">
        
        <label for="titulo_mapa_curricular">Título Mapa Curricular:</label>
        <input type="text" name="titulo_mapa_curricular" id="titulo_mapa_curricular">
        
        <label for="desc_mapa_curricular">Descripción Mapa Curricular:</label>
        <textarea name="desc_mapa_curricular" id="desc_mapa_curricular"></textarea>
        
        <label for="link_img_mapa_curricular">Link Imagen Mapa Curricular:</label>
        <input type="text" name="link_img_mapa_curricular" id="link_img_mapa_curricular">
        
        <label for="link_video_clase_muestra">Link Video Clase Muestra:</label>
        <input type="text" name="link_video_clase_muestra" id="link_video_clase_muestra">
        
        <label for="link_img_extra">Link Imagen Extra:</label>
        <input type="text" name="link_img_extra" id="link_img_extra">
        
        <label for="desc_extra">Descripción Extra:</label>
        <textarea name="desc_extra" id="desc_extra"></textarea>
        
        <label for="servicio_id">Servicio:</label>
        <select name="servicio_id" id="servicio_id" required>
            <option value="">Seleccione un servicio</option>
            @foreach($servicios as $servicio)
                <option value="{{ $servicio->id }}" data-requiere-programas="{{ $servicio->requiere_programas }}">
                    {{ $servicio->nombre }}
                </option>
            @endforeach
        </select>
        
        <div id="programas-container" style="display: none;">
            <label for="programa_id">Programas:</label>
            <select name="programa_id" id="programa_id">
                <!-- Opciones de programas se llenarán dinámicamente -->
            </select>
        </div>
        
        <button type="submit">Guardar</button>
    </form>

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