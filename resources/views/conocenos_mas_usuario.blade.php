<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- box icons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Icono FiveIcon -->
    <link rel="icon" href="{{ asset('img/LogoF.jpg') }}" sizes="32x32" type="image/png">

    <!-- Enlace para Iconos -->  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <title>Instituto Universitario Enlace - Conócenos Más</title>

    @vite('resources/css/app.css')
    @vite('resources/css/noticias.css')
    @vite('resources/js/app.js')

    <meta property="og:title" content="Instituto Universitario Enlace">
    <meta property="og:description" content="Bienvenido al Instituto Universitario Enlace, donde la educación en línea se encuentra con la innovación y el desarrollo profesional.">
    <meta property="og:image" content="https://raw.githubusercontent.com/AlexGlez1489/Porfolio-V2/main/Captura%20de%20pantalla%202024-09-04%20001920.png">
    <meta property="og:url" content="https://glezdev.com/">
    <meta property="og:type" content="website">

    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f4f4f4; /* Color de fondo claro para un diseño minimalista */
        }

        .main-content {
            max-width: 800px; /* Ancho máximo del contenido */
            margin: 2rem auto; /* Centrar el contenido en la página */
            padding: 2rem;
            background-color: white; /* Fondo blanco para el contenido */
            border-radius: 8px; /* Bordes redondeados */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Sombra suave para dar profundidad */
        }

        .titulo-conocenos {
            font-weight: bold;
            margin-bottom: 1rem;
            text-align: center;
            color: #333; /* Color de texto oscuro para mejor contraste */
        }

        .contenido-conocenos p {
            margin-bottom: 1rem;
            color: #555; /* Color de texto para el contenido */
        }

        .contenido-conocenos img {
            max-width: 100%;
            height: auto;
            margin-bottom: 1rem;
        }

        dl, ol, ul {
            margin-top: 0;
            margin-bottom: 0rem;
        }
    </style>
</head>
<body>
@include('includes.navbar')

<br>
<br>
<br>
<div class="main-content">
    <section id="conocenos_scroll" class="contenedor-conocenos fade-in">
        <h2 class="titulo-conocenos side-left">Conócenos Más</h2>
        <div class="contenido-conocenos">
            <h3>Misión</h3>
            <p>{{ $conocenosMas->mision }}</p>
            <h3>Visión</h3>
            <p>{{ $conocenosMas->vision }}</p>
            <h3>Valores</h3>
            <p>{{ $conocenosMas->valores }}</p>
            <h3>Objetivo</h3>
            <p>{{ $conocenosMas->objetivo }}</p>
            @if($conocenosMas->img1)
                <img src="{{ $conocenosMas->img1 }}" alt="Imagen 1">
            @endif
            @if($conocenosMas->img2)
                <img src="{{ $conocenosMas->img2 }}" alt="Imagen 2">
            @endif
            @if($conocenosMas->img3)
                <img src="{{ $conocenosMas->img3 }}" alt="Imagen 3">
            @endif
            @if($conocenosMas->img4)
                <img src="{{ $conocenosMas->img4 }}" alt="Imagen 4">
            @endif
        </div>
    </section>
</div>

<!-- Footer -->
@include('includes.footer')
<!-- Fin de footer -->

<!-- scroll reveal -->
<script src="https://unpkg.com/scrollreveal"></script>

<div id="app"></div>
<script src="/scripts.js"></script> <!-- Ruta corregida para scripts.js -->

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>