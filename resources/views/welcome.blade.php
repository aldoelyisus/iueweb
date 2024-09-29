<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- box icons -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    
  <!-- Icono FiveIcon -->
  <link rel="icon" href="img/LogoF.jpg" sizes="32x32" type="image/png">

    <!-- Enlace para Iconos -->  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Instituto Universitario Enlace</title>
   
    <!-- Solo usa Vite para cargar tus archivos CSS y JS -->
    @vite('resources/css/app.css')
    @vite('resources/css/noticias.css')
    @vite('resources/js/app.js')

    <meta property="og:title" content="Instituto Universitario Enlace">
    <meta property="og:description" content="Bienvenido al Instituto Universitario Enlace, donde la educación en línea se encuentra con la innovación y el desarrollo profesional.">
    <meta property="og:image" content="https://raw.githubusercontent.com/AlexGlez1489/Porfolio-V2/main/Captura%20de%20pantalla%202024-09-04%20001920.png">
    <meta property="og:url" content="https://glezdev.com/">
    <meta property="og:type" content="website">
</head>
<body>

<!-- Pantalla de carga -->
<div id="loading">
    <img src="img/LogoF.jpg" alt="Cargando...">
</div>

<header class="cabeza">
    <div class="barra">
    <div class="logo">
    <a href="{{ route('login') }}"> <!-- Cambia esto para redirigir al login de Laravel -->
        <img src="{{ asset('img/Logo_IUE.png') }}" alt="Logo">
    </a>
</div>

        <img class="menu-btn" id="menu-btn" src="{{ asset('img/Menu-w.png') }}" alt="Menú">
        <nav class="barra-principal" id="barra-principal">
            <a href="#contacto_scroll" class="smooth-scroll">Inicio</a>
            <!-- Dropdown "desglozar contenido" -->
            <div class="dropdown"> 
                <ul id="plantel" class="smooth-scroll">Nuestro Plantel</ul>
                <div class="dropdown-content">
                    <a href="#mision">Misión</a>
                    <a href="#vision">Visión</a>
                    <a href="#valores">Valores</a>
                </div>
            </div>
            <!-- Dropdown "desglozar contenido" -->
            <div class="dropdown">
                <ul id="oferta" class="smooth-scroll">Oferta Académica</ul>
                <div class="dropdown-content">
                    <a href="Oferta_Academica/secundaria.html">Secundaria</a>
                    <a href="Oferta_Academica/bachillerato.html">Bachillerato</a>
                    <a href="Oferta_Academica/licenciaturas.html">Licenciaturas</a>
                    <a href="Oferta_Academica/maestrias.html">Maestrías</a>
                </div>
            </div>
            <!-- Dropdown "desglozar contenido" -->
            <div class="dropdown">
                <ul id="plataforma" class="smooth-scroll">Plataforma Educativa</ul>
                <div class="dropdown-content">
                    <a href="#beneficios">Beneficios</a>
                    <a href="#aplicada">Plataforma Aplicada</a>
                    <a href="#tutorial">Tutorial</a>
                </div>
            </div>
            <a href="contacto.html" class="smooth-scroll">Contáctanos</a>

            <div class="social-media">
                <a href="https://www.facebook.com/p/Instituto-Universitario-Enlace-100069745053476/" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="https://wa.me/15549174404" target="_blank" aria-label="whatsapp"><i class="fab fa-whatsapp"></i></a>
                <a href="https://www.youtube.com/@IUE_edu" target="_blank" aria-label="Youtube"><i class="fab fa-youtube"></i></a>
            </div>
        </nav>
    </div>
</header>
<!-- Fin del encabezado Menú -->

<!-- Inicio de Slider y cuerpo -->
<section class="contenedor-slider contenedor fade-in">
    <!-- Contenedor de imágenes -->
    <div class="slider-frame">
        <ul id="slider">
            @php
                // Array con las imágenes (puedes modificar estas rutas según tus necesidades)
                $images = [
                    'img/img1.png', 
                    'img/banner-1.png', 
                    'img/banner-2.png', 
                    'img/banner-3.png'
                ];
            @endphp

            @foreach ($images as $image)
                <li><img src="{{ asset($image) }}" alt="Banner">Banner</li>
            @endforeach
        </ul>
    </div>
    <!-- Fin del contenedor de imágenes -->

    <!-- Flechas Anterior y Siguiente -->
    <div class="controls">
        <button class="prev">&#10094;</button>
        <button class="next">&#10095;</button>
    </div>
    <!-- Fin de indicador de flechas -->

    <!-- Indicadores redondos -->
    <div class="indicators">
        @foreach ($images as $index => $image)
            <span class="dot" onclick="currentSlide({{ $index + 1 }})"></span>
        @endforeach
    </div>
</section>

<!-- Sección de cuerpo eslogan -->
<section class="contenedor-cuerpo contenedor">
    <div class="eslogan">
        <h2 class="side-left">El fracaso y el rechazo son sólo el primer escalón hacia el éxito</h2>
        <p class="side-right">Jim Valvano</p>
    </div>
</section>
<!-- Fin de cuerpo eslogan -->

<!-- Cuerpo Youtube -->
<section class="yt-contenedor">
    <h2 class="side-left">Instituto Universitario Enlace</h2>
    <iframe class="fade-in" width="900" height="500" src="https://www.youtube.com/embed/bEM7nKTvY2U" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</section>
<!-- Fin de cuerpo Youtube -->

<!-- Sección de Noticias -->
<section class="contenedor-noticias fade-in">
    <h2 class="titulo-noticias side-left">Últimas Noticias</h2>
    <div class="noticias-grid">
        <article class="noticia">
            <img src="{{ asset('img/noticias/noticia_1.jpg') }}" alt="Noticia 1">
            <div class="contenido-noticia">
                <h3>Título de Noticia 1</h3>
                <p>Resumen breve de la noticia 1. Puedes leer más detalles dentro de la página.</p>
                <a href="#" class="btn-leer-mas">Leer más</a>
            </div>
        </article>
        <article class="noticia">
            <img src="{{ asset('img/noticias/noticia_2.jpg') }}"  alt="Noticia 2">
            <div class="contenido-noticia">
                <h3>Título de Noticia 2</h3>
                <p>Resumen breve de la noticia 2. Puedes leer más detalles dentro de la página.</p>
                <a href="#" class="btn-leer-mas">Leer más</a>
            </div>
        </article>
        <article class="noticia">
            <img src="{{ asset('img/noticias/noticia_3.jpg') }}"  alt="Noticia 3">
            <div class="contenido-noticia">
                <h3>Título de Noticia 3</h3>
                <p>Resumen breve de la noticia 3. Puedes leer más detalles dentro de la página.</p>
                <a href="#" class="btn-leer-mas">Leer más</a>
            </div>
        </article>
        <article class="noticia">
            <img src="{{ asset('img/noticias/noticia_4.jpg') }}"  alt="Noticia 4">
            <div class="contenido-noticia">
                <h3>Título de Noticia 4</h3>
                <p>Resumen breve de la noticia 4. Puedes leer más detalles dentro de la página.</p>
                <a href="#" class="btn-leer-mas">Leer más</a>
            </div>
        </article>
    </div>
</section>


<!-- Footer -->
<footer class="footer">
    <div class="contenedor">
        <div class="logo fade-in">
            <img src="{{ asset('img/Logo_IUE.png') }}" alt="Instituto Universitario Enlace">
        </div>
        <p class="side-left">&copy; 2024 Instituto Universitario Enlace. Todos los derechos reservados.</p>
        <p class="side-right"><a href="#contacto_scroll" class="smooth-scroll">Contáctanos</a> | <a href="#privacy_policy" class="smooth-scroll">Política de Privacidad</a></p>
        <div class="social-media side-down">
            <a href="https://www.facebook.com/p/Instituto-Universitario-Enlace-100069745053476/" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="https://wa.me/15549174404" target="_blank" aria-label="whatsapp"><i class="fab fa-whatsapp"></i></a>
            <a href="https://www.youtube.com/@IUE_edu" target="_blank" aria-label="Youtube"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
</footer>
<!-- Fin de footer -->




  <!-- scroll reveal -->
  <script src="https://unpkg.com/scrollreveal"></script>

<div id="app"></div>
<script src="/scripts.js"></script> <!-- Ruta corregida para scripts.js -->

</body>
</html>
