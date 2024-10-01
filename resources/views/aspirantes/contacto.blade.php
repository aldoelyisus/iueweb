<!-- resources/views/aspirantes/contacto.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- box icons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    
    <!-- Icono FiveIcon -->
    <link rel="icon" href="{{ asset('img/LogoF.jpg') }}" sizes="32x32" type="image/png">

    <!-- Enlace para Iconos -->  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

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

    <style>
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #000; /* Asegúrate de que el color del texto sea visible */
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="main-content">
    <section id="contacto_scroll" class="contenedor-contacto fade-in">
        <h2 class="titulo-contacto side-left">Contáctanos</h2>
        <form action="{{ route('aspirantes.store') }}" method="POST">
            @csrf
            @include('aspirantes.form', ['servicios' => $servicios, 'programas' => $programas])
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </section>
</div>

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

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const servicioSelect = document.getElementById('servicio_interes');
        const programaSelect = document.getElementById('programa_interes');
        const programaGroup = document.getElementById('programa_interes_group');

        servicioSelect.addEventListener('change', function () {
            const selectedServicio = this.value;
            if (selectedServicio) {
                const programas = programaSelect.querySelectorAll('option');
                let hasProgramas = false;
                programas.forEach(option => {
                    if (option.getAttribute('data-servicio') == selectedServicio) {
                        option.style.display = 'block';
                        hasProgramas = true;
                    } else {
                        option.style.display = 'none';
                    }
                });
                programaGroup.style.display = hasProgramas ? 'block' : 'none';
            } else {
                programaGroup.style.display = 'none';
            }
        });
    });
</script>

</body>
</html>