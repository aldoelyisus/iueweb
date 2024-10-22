@extends('layout')

@section('title', 'Detalles de Conócenos Más')

@section('content')
    <style>
        .content-wrapper {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .content-wrapper h1 {
            text-align: center;
            font-size: 2.5em;
            color: #333;
            margin-bottom: 20px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .content-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .content-section:nth-child(even) {
            flex-direction: row-reverse;
        }

        .content-section img {
            width: 300px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .content-section div {
            flex: 1;
            padding: 20px;
        }

        .content-section p {
            font-size: 1.2em;
            color: #666;
            line-height: 1.8;
            text-align: justify;
        }

        .content-section label {
            font-size: 1.5em;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
            display: block;
        }

        .btn-secondary {
            display: block;
            width: 200px;
            margin: 30px auto;
            text-align: center;
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #555;
        }
    </style>

    <div class="content-wrapper">
        <h1>Detalles de Conócenos Más</h1>

        <!-- Sección de Misión -->
        <div class="content-section">
            <div>
                <label>Misión</label>
                <p>{{ $item->mision }}</p>
            </div>
            @if($item->img1)
                <img src="{{ $item->img1 }}" alt="Imagen Misión">
            @endif
        </div>

        <!-- Sección de Visión -->
        <div class="content-section">
            <div>
                <label>Visión</label>
                <p>{{ $item->vision }}</p>
            </div>
            @if($item->img2)
                <img src="{{ $item->img2 }}" alt="Imagen Visión">
            @endif
        </div>

        <!-- Sección de Valores -->
        <div class="content-section">
            <div>
                <label>Valores</label>
                <p>{{ $item->valores }}</p>
            </div>
            @if($item->img3)
                <img src="{{ $item->img3 }}" alt="Imagen Valores">
            @endif
        </div>

        <!-- Sección de Objetivo -->
        <div class="content-section">
            <div>
                <label>Objetivo</label>
                <p>{{ $item->objetivo }}</p>
            </div>
            @if($item->img4)
                <img src="{{ $item->img4 }}" alt="Imagen Objetivo">
            @endif
        </div>

        <a href="{{ route('conocenos_mas.index') }}" class="btn btn-secondary">Volver</a>
    </div>
@endsection