<?php

require_once '../utils/base_url.php';

?>
<!DOCTYPE html>
<html lang="es" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa de Clientes | LogixSoft</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjyM0CyjiksJbMk4SVzZTz-Uzn5QusoRE&libraries=places&callback=initMap" async defer></script>

    <!-- Estilos personalizados -->
    <link href="<?= $base_url ?>CSS/views/maps.css" rel="stylesheet">
</head>

<body class="bg-gray-50 h-full">
    <!-- Barra de navegación -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <i class="fas fa-map-marked-alt text-primary-600 text-2xl mr-2"></i>
                        <span class="text-xl font-semibold text-gray-800">LogixSoft Mapa</span>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="relative">
                        <input id="pac-input" class="search-box py-2 px-4 pr-10 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent" type="text" placeholder="Buscar ubicación...">
                        <div class="absolute right-3 top-2.5 text-gray-400">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Menú de navegación -->
    <div class="nav-menu py-3">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <?php include_once '../components/menu.php'; ?>
        </div>
    </div>

    <!-- Contenedor principal -->
    <div class="flex h-full">
        <!-- Panel lateral -->
        <div class="w-64 bg-white shadow-md hidden md:block">
            <div class="p-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Clientes</h3>
                <p class="text-sm text-gray-500">5 clientes registrados</p>
            </div>
            <div class="overflow-y-auto" style="height: calc(100vh - 120px);">
                <ul class="divide-y divide-gray-200">
                    <li>
                        <button
                            class="w-full text-left p-4 hover:bg-gray-50 cursor-pointer flex items-center focus:outline-none"
                            onclick="flyTo(13.705243, -89.24231)"
                            onkeydown="if(event.key==='Enter'||event.key===' '){flyTo(13.705243, -89.24231);}"
                            type="button"
                            aria-label="Ir a Punto 1, San Salvador">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-primary-100 flex items-center justify-center">
                                <i class="fas fa-user text-primary-600"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Punto 1</p>
                                <p class="text-sm text-gray-500">San Salvador</p>
                            </div>
                        </button>
                    </li>
                    <li>
                        <button
                            class="w-full text-left p-4 hover:bg-gray-50 cursor-pointer flex items-center focus:outline-none"
                            onclick="flyTo(13.696674, -89.197927)"
                            onkeydown="if(event.key==='Enter'||event.key===' '){flyTo(13.696674, -89.197927);}"
                            type="button"
                            aria-label="Ir a Punto 2, Santa Tecla">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-primary-100 flex items-center justify-center">
                                <i class="fas fa-user text-primary-600"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Punto 2</p>
                                <p class="text-sm text-gray-500">Santa Tecla</p>
                            </div>
                        </button>
                    </li>
                    <li>
                        <button
                            class="w-full text-left p-4 hover:bg-gray-50 cursor-pointer flex items-center focus:outline-none"
                            onclick="flyTo(14.692511, -87.86136)"
                            onkeydown="if(event.key==='Enter'||event.key===' '){flyTo(14.692511, -87.86136);}"
                            type="button"
                            aria-label="Ir a Punto 3, Honduras">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-primary-100 flex items-center justify-center">
                                <i class="fas fa-user text-primary-600"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Punto 3</p>
                                <p class="text-sm text-gray-500">Honduras</p>
                            </div>
                        </button>
                    </li>
                    <li>
                        <button
                            class="w-full text-left p-4 hover:bg-gray-50 cursor-pointer flex items-center focus:outline-none"
                            onclick="flyTo(12.022747, -86.252007)"
                            onkeydown="if(event.key==='Enter'||event.key===' '){flyTo(12.022747, -86.252007);}"
                            type="button"
                            aria-label="Ir a Punto 4, Nicaragua">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-primary-100 flex items-center justify-center">
                                <i class="fas fa-user text-primary-600"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Punto 4</p>
                                <p class="text-sm text-gray-500">Nicaragua</p>
                            </div>
                        </button>
                    </li>
                    <li>
                        <button
                            class="w-full text-left p-4 hover:bg-gray-50 cursor-pointer flex items-center focus:outline-none"
                            onclick="flyTo(8.103289, -80.596013)"
                            onkeydown="if(event.key==='Enter'||event.key===' '){flyTo(8.103289, -80.596013);}"
                            type="button"
                            aria-label="Ir a Punto 5, Panamá">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-primary-100 flex items-center justify-center">
                                <i class="fas fa-user text-primary-600"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Punto 5</p>
                                <p class="text-sm text-gray-500">Panamá</p>
                            </div>
                        </button>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Mapa -->
        <div id="map"></div>
    </div>

    <script src="<?= $base_url ?>JS/utils/map_clients.js"></script>
</body>

</html>