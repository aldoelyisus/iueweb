

<header class="cabeza">
    <div class="barra">
    <div class="logo">
    <a href="{{ route('login') }}"> <!-- Cambia esto para redirigir al login de Laravel -->
        <img src="{{ asset('img/Logo_IUE.png') }}" alt="Logo">
    </a>
</div>

        <img class="menu-btn" id="menu-btn" src="{{ asset('img/Menu-w.png') }}" alt="Menú">
        <nav class="barra-principal" id="barra-principal">
            <a href="{{ route('welcome') }}" class="smooth-scroll">Inicio</a>
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
            <a href="{{ route('contacto') }}"class="smooth-scroll">Contáctanos</a>

            <div class="social-media">
                <a href="https://www.facebook.com/p/Instituto-Universitario-Enlace-100069745053476/" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="https://wa.me/15549174404" target="_blank" aria-label="whatsapp"><i class="fab fa-whatsapp"></i></a>
                <a href="https://www.youtube.com/@IUE_edu" target="_blank" aria-label="Youtube"><i class="fab fa-youtube"></i></a>
            </div>
        </nav>
    </div>
</header>
<!-- Fin del encabezado Menú -->