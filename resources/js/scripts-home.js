// Desglozar menú
const menuBtn = document.getElementById('menu-btn');
const barraPrincipal = document.getElementById('barra-principal');

menuBtn.addEventListener('click', () => {
    barraPrincipal.classList.toggle('mostrar');
});

// Agregar evento para cerrar el menú al hacer clic fuera de él
document.addEventListener('click', (e) => {
    if (e.target !== menuBtn && e.target !== barraPrincipal) {
        barraPrincipal.classList.remove('mostrar');
    }
});


// Barra de navegación (ocultarse)

let lastScrollTop = 0;
        const barra = document.querySelector('.barra');
    
        window.addEventListener('scroll', function() {
            let currentScroll = window.pageYOffset || document.documentElement.scrollTop;
    
            if (currentScroll > lastScrollTop) {
                // Scrolling down
                barra.style.transform = 'translateY(-100%)'; // Ocultar la barra
            } else {
                // Scrolling up
                barra.style.transform = 'translateY(0)'; // Mostrar la barra
            }
    
            lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // Para no permitir valores negativos
        });


        document.addEventListener("DOMContentLoaded", function() {
            const nosotrosSection = document.getElementById('nosotros');
        
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        nosotrosSection.classList.add('visible');
                    } else {
                        nosotrosSection.classList.remove('visible');
                    }
                });
            }, {
                threshold: 0.5
            });
        
            observer.observe(nosotrosSection);
        });
        

// Índice de la diapositiva actual (comienza en 0)
let slideIndex = 0;

// Selecciona todos los elementos de la diapositiva dentro del contenedor de slider
let slides = document.querySelectorAll(".slider-frame ul li");

// Selecciona todos los indicadores (círculos) de la diapositiva
let dots = document.querySelectorAll(".dot");

// Intervalo para el deslizamiento automático
let autoSlideInterval;
// Temporizador para detener el deslizamiento automático
let autoSlideTimeout;

/**
 * Muestra la diapositiva en el índice especificado
 * @param {number} n - El índice de la diapositiva que se desea mostrar
 */
function showSlides(n) {
    // Asegúrate de que el índice de la diapositiva esté dentro del rango
    if (n >= slides.length) slideIndex = 0;
    if (n < 0) slideIndex = slides.length - 1;

    // Calcula el margen a la izquierda para mover el slider
    const marginLeft = -100 * slideIndex + "%";
    document.querySelector(".slider-frame ul").style.marginLeft = marginLeft;

    // Actualiza los indicadores de diapositiva (círculos) para reflejar la diapositiva actual
    dots.forEach((dot, index) => {
        dot.className = dot.className.replace(" active", ""); // Elimina la clase 'active' de todos los indicadores
        if (index === slideIndex) dot.className += " active"; // Agrega la clase 'active' al indicador correspondiente
    });
}

/**
 * Muestra la diapositiva correspondiente al número dado
 * @param {number} n - El número de la diapositiva que se desea mostrar (basado en 1)
 */
function currentSlide(n) {
    showSlides(slideIndex = n - 1); // Ajusta el índice de la diapositiva y muestra la diapositiva correspondiente
}

/**
 * Muestra la siguiente diapositiva
 */
function nextSlide() {
    showSlides(slideIndex += 1); // Incrementa el índice de la diapositiva y muestra la siguiente diapositiva
}

/**
 * Muestra la diapositiva anterior
 */
function prevSlide() {
    showSlides(slideIndex -= 1); // Decrementa el índice de la diapositiva y muestra la diapositiva anterior
}

/**
 * Inicia el deslizamiento automático de las diapositivas
 */
function autoSlide() {
    autoSlideInterval = setInterval(nextSlide, 5000); // Cambia a la siguiente diapositiva cada 5 segundos
}

/**
 * Detiene el deslizamiento automático y reinicia el temporizador
 */
function stopAutoSlide() {
    clearInterval(autoSlideInterval); // Detiene el intervalo de deslizamiento automático
    clearTimeout(autoSlideTimeout); // Limpia el temporizador de reinicio
    autoSlideTimeout = setTimeout(autoSlide, 5000); // Reinicia el deslizamiento automático después de 5 segundos de inactividad
}

// Agrega un manejador de eventos para el botón de diapositiva anterior
document.querySelector(".prev").addEventListener("click", () => {
    prevSlide(); // Muestra la diapositiva anterior
    stopAutoSlide(); // Detiene el deslizamiento automático y reinicia el temporizador
});

// Agrega un manejador de eventos para el botón de diapositiva siguiente
document.querySelector(".next").addEventListener("click", () => {
    nextSlide(); // Muestra la siguiente diapositiva
    stopAutoSlide(); // Detiene el deslizamiento automático y reinicia el temporizador
});

// Agrega un manejador de eventos a cada indicador de diapositiva
dots.forEach((dot, index) => {
    dot.addEventListener("click", () => {
        currentSlide(index + 1); // Muestra la diapositiva correspondiente al indicador clicado
        stopAutoSlide(); // Detiene el deslizamiento automático y reinicia el temporizador
    });
});

// Inicia el deslizamiento automático cuando la página se carga
document.addEventListener("DOMContentLoaded", () => {
    autoSlide();
});document.addEventListener('DOMContentLoaded', function () {
    const dropdowns = document.querySelectorAll('.dropdown');

    dropdowns.forEach(dropdown => {
        const ul = dropdown.querySelector('ul');
        const dropdownContent = dropdown.querySelector('.dropdown-content');

        ul.addEventListener('click', function (e) {
            // Prevenir el cierre si se hace clic dentro del dropdown
            e.stopPropagation();

            // Alternar la visibilidad del contenido dropdown
            if (dropdown.classList.contains('show')) {
                dropdown.classList.remove('show');
            } else {
                dropdowns.forEach(d => d.classList.remove('show')); // Cerrar otros dropdowns
                dropdown.classList.add('show');
            }
        });
    });

    // Cerrar dropdowns si se hace clic fuera de ellos
    document.addEventListener('click', function () {
        dropdowns.forEach(dropdown => {
            dropdown.classList.remove('show');
        });
    });
});


 // Ocultar la pantalla de carga una vez que se haya cargado la página
 window.addEventListener('load', function () {
    const loading = document.getElementById('loading');
    loading.style.display = 'none';
    document.body.style.overflow = 'auto'; // Restaurar el desplazamiento
});


/*==================== quita toggle icon y navbar cuando da click  ====================*/
ScrollReveal({
    reset: true,
    distance: '80px',
    duration: 2000,
    delay: 200
   });

   ScrollReveal().reveal('.side-top', { origin: 'top'});
   ScrollReveal().reveal('.side-down', { origin: 'bottom'});
   ScrollReveal().reveal('.side-left',  { origin: 'left'});
   ScrollReveal().reveal('.side-right',  { origin: 'right'});