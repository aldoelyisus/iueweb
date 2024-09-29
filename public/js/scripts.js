// Función para cambiar el tema
function toggleTheme() {
    const isDarkMode = document.body.classList.toggle('dark-mode');
    localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');
}

// Función para cargar el tema guardado
function loadTheme() {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }
}

// Función para toggle el sidebar
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.querySelector('.main-content');

    sidebar.classList.toggle('hidden');  // Mostrar/ocultar el sidebar
    mainContent.classList.toggle('hidden');  // Ajustar el contenido principal
}


// Cargar el tema guardado al cargar la página
document.addEventListener('DOMContentLoaded', function() {
    loadTheme();

    // Añadir evento al botón de cambio de tema
    document.getElementById('toggleTheme')?.addEventListener('click', toggleTheme);

    // Añadir evento al botón de toggle del sidebar
    document.getElementById('toggleSidebar')?.addEventListener('click', toggleSidebar);
});



 // Ocultar la pantalla de carga una vez que se haya cargado la página
 window.addEventListener('load', function () {
    const loading = document.getElementById('loading');
    loading.style.display = 'none';
    document.body.style.overflow = 'auto'; // Restaurar el desplazamiento
});