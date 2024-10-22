@extends('layout')

@section('title', 'Conócenos Más - Listado')

@section('content')
    <h1>Conócenos Más</h1>
    <table class="table table-rounded mt-3">
        <thead>
            <tr>
                <th>Misión</th>
                <th>Visión</th>
                <th>Valores</th>
                <th>Objetivo</th>
                <th>Imágenes</th>
                <th style="width: 200px;">Acciones</th> <!-- Ajustar el ancho de la columna de acciones -->
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td class="text-truncate" style="max-width: 150px;">{{ Str::limit($item->mision, 50) }}</td>
                    <td class="text-truncate" style="max-width: 150px;">{{ Str::limit($item->vision, 50) }}</td>
                    <td class="text-truncate" style="max-width: 150px;">{{ Str::limit($item->valores, 50) }}</td>
                    <td class="text-truncate" style="max-width: 150px;">{{ Str::limit($item->objetivo, 50) }}</td>
                    <td>
                        @if($item->img1) <img src="{{ $item->img1 }}" width="50"> @endif
                        @if($item->img2) <img src="{{ $item->img2 }}" width="50"> @endif
                        @if($item->img3) <img src="{{ $item->img3 }}" width="50"> @endif
                        @if($item->img4) <img src="{{ $item->img4 }}" width="50"> @endif
                    </td>
                    <td>
                        <a href="{{ route('conocenos_mas.show', $item->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('conocenos_mas.edit', $item->id) }}" class="btn btn-warning">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection