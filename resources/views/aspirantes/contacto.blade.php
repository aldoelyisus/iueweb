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

    <title>Instituto Universitario Enlace - Contacto</title>
   
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
        <form action="{{ route('contacto.enviar') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombrecompleto">Nombre Completo</label>
                <input type="text" name="nombrecompleto" id="nombrecompleto" class="form-control" value="{{ old('nombrecompleto') }}">
            </div>
            <div class="form-group">
                <label for="edad">Edad</label>
                <input type="number" name="edad" id="edad" class="form-control" value="{{ old('edad') }}">
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono') }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="servicio_id">Servicio de Interés</label>
                <select name="servicio_id" id="servicio_id" class="form-control">
                    <option value="">Seleccione un servicio</option>
                    @foreach($servicios as $servicio)
                        <option value="{{ $servicio->id }}" data-requiere-programas="{{ $servicio->requiere_programas }}">
                            {{ $servicio->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" id="programas-container" style="display: none;">
                <label for="programa_id">Programa de Interés</label>
                <select name="programa_id" id="programa_id" class="form-control">
                    <!-- Opciones de programas se llenarán dinámicamente -->
                </select>
            </div>
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
        const servicioSelect = document.getElementById('servicio_id');
        const programasContainer = document.getElementById('programas-container');
        const programaSelect = document.getElementById('programa_id');

        function loadProgramas(servicioId) {
            fetch(`/servicios/${servicioId}/programas`)
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
        }

        servicioSelect.addEventListener('change', function () {
            const selectedOption = servicioSelect.options[servicioSelect.selectedIndex];
            const requiereProgramas = selectedOption.getAttribute('data-requiere-programas') === '1';

            if (requiereProgramas) {
                loadProgramas(selectedOption.value);
            } else {
                programasContainer.style.display = 'none';
            }
        });
    });
</script>

</body>
</html>