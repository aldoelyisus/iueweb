@extends('layout')

@section('title', 'Conócenos Más - Listado')

@section('content')
    <h1>Conócenos Más</h1>
    <a href="{{ route('conocenos_mas.create') }}" class="btn btn-primary">Crear Nuevo</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Misión</th>
                <th>Visión</th>
                <th>Valores</th>
                <th>Objetivo</th>
                <th>Imágenes</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->mision }}</td>
                    <td>{{ $item->vision }}</td>
                    <td>{{ $item->valores }}</td>
                    <td>{{ $item->objetivo }}</td>
                    <td>
                        @if($item->img1) <img src="{{ $item->img1 }}" width="50"> @endif
                        @if($item->img2) <img src="{{ $item->img2 }}" width="50"> @endif
                        @if($item->img3) <img src="{{ $item->img3 }}" width="50"> @endif
                        @if($item->img4) <img src="{{ $item->img4 }}" width="50"> @endif
                    </td>
                    <td>
                        <a href="{{ route('conocenos_mas.show', $item->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('conocenos_mas.edit', $item->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('conocenos_mas.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection