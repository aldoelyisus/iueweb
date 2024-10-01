@extends('layout.app')

@section('content')
    <h1>Editar Modalidad</h1>
    <form action="{{ route('modalidades.update', $modalidad->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" value="{{ $modalidad->titulo }}" required>
        
        <label for="subtitulo">Subtítulo:</label>
        <input type="text" name="subtitulo" id="subtitulo" value="{{ $modalidad->subtitulo }}">
        
        <label for="titulo_perfil_ingreso">Título Perfil Ingreso:</label>
        <input type="text" name="titulo_perfil_ingreso" id="titulo_perfil_ingreso" value="{{ $modalidad->titulo_perfil_ingreso }}">
        
        <label for="desc_perfil_ingreso">Descripción Perfil Ingreso:</label>
        <textarea name="desc_perfil_ingreso" id="desc_perfil_ingreso">{{ $modalidad->desc_perfil_ingreso }}</textarea>
        
        <label for="link_img_perfil_ingreso">Link Imagen Perfil Ingreso:</label>
        <input type="text" name="link_img_perfil_ingreso" id="link_img_perfil_ingreso" value="{{ $modalidad->link_img_perfil_ingreso }}">
        
        <label for="titulo_perfil_egreso">Título Perfil Egreso:</label>
        <input type="text" name="titulo_perfil_egreso" id="titulo_perfil_egreso" value="{{ $modalidad->titulo_perfil_egreso }}">
        
        <label for="desc_perfil_egreso">Descripción Perfil Egreso:</label>
        <textarea name="desc_perfil_egreso" id="desc_perfil_egreso">{{ $modalidad->desc_perfil_egreso }}</textarea>
        
        <label for="link_img_perfil_egreso">Link Imagen Perfil Egreso:</label>
        <input type="text" name="link_img_perfil_egreso" id="link_img_perfil_egreso" value="{{ $modalidad->link_img_perfil_egreso }}">
        
        <label for="titulo_mapa_curricular">Título Mapa Curricular:</label>
        <input type="text" name="titulo_mapa_curricular" id="titulo_mapa_curricular" value="{{ $modalidad->titulo_mapa_curricular }}">
        
        <label for="desc_mapa_curricular">Descripción Mapa Curricular:</label>
        <textarea name="desc_mapa_curricular" id="desc_mapa_curricular">{{ $modalidad->desc_mapa_curricular }}</textarea>
        
        <label for="link_img_mapa_curricular">Link Imagen Mapa Curricular:</label>
        <input type="text" name="link_img_mapa_curricular" id="link_img_mapa_curricular" value="{{ $modalidad->link_img_mapa_curricular }}">
        
        <label for="link_video_clase_muestra">Link Video Clase Muestra:</label>
        <input type="text" name="link_video_clase_muestra" id="link_video_clase_muestra" value="{{ $modalidad->link_video_clase_muestra }}">
        
        <label for="link_img_extra">Link Imagen Extra:</label>
        <input type="text" name="link_img_extra" id="link_img_extra" value="{{ $modalidad->link_img_extra }}">
        
        <label for="desc_extra">Descripción Extra:</label>
        <textarea name="desc_extra" id="desc_extra">{{ $modalidad->desc_extra }}</textarea>
        
        <label for="servicio_id">Servicio:</label>
        <select name="servicio_id" id="servicio_id" required>
            @foreach($servicios as $servicio)
                <option value="{{ $servicio->id }}" {{ $modalidad->servicios->contains($servicio->id) ? 'selected' : '' }}>
                    {{ $servicio->nombre }}
                </option>
            @endforeach
        </select>
        
        <button type="submit">Actualizar</button>
    </form>
@endsection