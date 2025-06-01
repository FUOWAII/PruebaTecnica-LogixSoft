<!-- menu.php -->
<nav class="flex items-center space-x-6">
    <!-- Ítems del menú -->
    <div class="hidden md:flex items-center space-x-6">
        <a href="../views/maps.php" class="menu-item group relative py-2 px-1 text-sm font-medium text-gray-700 hover:text-primary-600 transition-colors duration-300">
            <div class="flex items-center">
                <i class="fas fa-map-marked-alt mr-2 text-primary-500"></i>
                <span>Mapa</span>
            </div>
            <div class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary-600 group-hover:w-full transition-all duration-300"></div>
        </a>
        
        <a href="../views/tabla.php" class="menu-item group relative py-2 px-1 text-sm font-medium text-gray-700 hover:text-primary-600 transition-colors duration-300">
            <div class="flex items-center">
                <i class="fas fa-table mr-2 text-primary-500"></i>
                <span>Tabla</span>
            </div>
            <div class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary-600 group-hover:w-full transition-all duration-300"></div>
        </a>
        
        <a href="../views/calor.php" class="menu-item group relative py-2 px-1 text-sm font-medium text-gray-700 hover:text-primary-600 transition-colors duration-300">
            <div class="flex items-center">
                <i class="fas fa-fire mr-2 text-primary-500"></i>
                <span>Mapa de Calor</span>
            </div>
            <div class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary-600 group-hover:w-full transition-all duration-300"></div>
        </a>
        
        <a href="../utils/logout.php" class="menu-item group relative py-2 px-1 text-sm font-medium text-gray-700 hover:text-red-600 transition-colors duration-300">
            <div class="flex items-center">
                <i class="fas fa-sign-out-alt mr-2 text-red-500"></i>
                <span>Salir</span>
            </div>
            <div class="absolute bottom-0 left-0 w-0 h-0.5 bg-red-600 group-hover:w-full transition-all duration-300"></div>
        </a>
    </div>

    <!-- Menú móvil (hamburguesa) -->
    <div class="md:hidden">
        <button id="mobile-menu-button" class="text-gray-500 hover:text-primary-600 focus:outline-none">
            <i class="fas fa-bars text-xl"></i>
        </button>
    </div>
</nav>

<!-- Menú móvil desplegable -->
<div id="mobile-menu" class="hidden md:hidden absolute right-0 mt-2 w-56 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-50">
    <div class="py-1">
        <a href="../views/mapa.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-primary-600">
            <i class="fas fa-map-marked-alt mr-2 text-primary-500"></i> Mapa
        </a>
        <a href="../views/tabla.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-primary-600">
            <i class="fas fa-table mr-2 text-primary-500"></i> Tabla
        </a>
        <a href="../views/calor.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-primary-600">
            <i class="fas fa-fire mr-2 text-primary-500"></i> Mapa de Calor
        </a>
        <div class="border-t border-gray-200 my-1"></div>
        <a href="../utils/logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-red-600">
            <i class="fas fa-sign-out-alt mr-2 text-red-500"></i> Salir
        </a>
    </div>
</div>

<script>
    // Toggle menu móvil
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
        
        // Cerrar al hacer clic fuera
        document.addEventListener('click', function closeMenu(e) {
            if (!menu.contains(e.target) && e.target.id !== 'mobile-menu-button') {
                menu.classList.add('hidden');
                document.removeEventListener('click', closeMenu);
            }
        });
    });

    // Resaltar ítem activo
    const currentPage = window.location.pathname.split('/').pop();
    document.querySelectorAll('.menu-item').forEach(item => {
        if (item.getAttribute('href').includes(currentPage)) {
            item.classList.add('text-primary-600');
            item.querySelector('div:last-child').classList.add('w-full');
        }
    });
</script>