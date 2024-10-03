<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

@include('includes.sidebar')
<div class="main-content">
    <header class="header d-flex align-items-center justify-content-between">
        <button id="toggleSidebar" class="btn btn-primary">
            <i class="fas fa-bars menu-icon"></i>
        </button>
        <h1 class="mx-auto">CRUD - Sistema de Configuración</h1>
        <button id="toggleTheme" class="btn btn-secondary">
            <i class="fas fa-moon"></i>
        </button>
    </header>
    <div class="container mt-5">
        <h2>Sección CRUD</h2>
        
        <!-- Aquí empieza la sección de las imágenes -->
        <div class="row">
            @php
                // Obtener las imágenes desde la sesión o base de datos
                $images = session('images', [
                    'img/img1.png',
                    'img/banner-1.png',
                    'img/banner-2.png',
                    'img/banner-3.png'
                ]);
            @endphp

            @foreach ($images as $index => $image)
                <div class="col-md-3">
                    <div class="card mb-4">
                    <img src="{{ asset($image) }}?{{ time() }}" alt="Banner" class="card-img-top">
                        <div class="card-body text-center">
                            <h5 class="card-title">Banner {{ $index + 1 }}</h5>

                            <!-- Formulario para reemplazar la imagen -->
                            <form action="{{ route('upload_image') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input type="file" name="image" required>
        <input type="hidden" name="banner_index" value="{{ $index }}">
    </div>
    <button type="submit" class="btn btn-primary">Reemplazar imagen</button>
</form>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
