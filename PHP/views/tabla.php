<?php

include_once '../utils/session.php';
include_once '../utils/base_url.php';

?>
<!DOCTYPE html>
<html lang="es" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Clientes | LogixSoft</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjyM0CyjiksJbMk4SVzZTz-Uzn5QusoRE&callback=initMap" async defer></script>


    <!-- Estilos personalizados -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }

        .table-container {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .table-row:hover {
            background-color: #f1f5f9;
        }

        .action-btn {
            transition: all 0.2s ease-in-out;
        }

        .action-btn:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body class="h-full">
    <!-- Barra de navegación -->
    <div class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <i class="fas fa-table text-primary-600 text-2xl mr-2"></i>
                        <span class="text-xl font-semibold text-gray-800">LogixSoft - Tabla de Clientes</span>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="relative">
                        <input id="search-input" class="py-2 px-4 pr-10 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent" type="text" placeholder="Buscar cliente...">
                        <div class="absolute right-3 top-2.5 text-gray-400">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menú de navegación -->
    <div class="nav-menu py-3 bg-gray-50 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <?php include '../components/menu.php'; ?>
        </div>
    </div>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <form method="POST" class="bg-white rounded-lg overflow-hidden table-container">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nombre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Latitud</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Longitud</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php
                        $puntos = [
                            ['Punto 1', 13.705243, -89.24231],
                            ['Punto 2', 13.696674, -89.197927],
                            ['Punto 3', 14.692511, -87.86136],
                            ['Punto 4', 12.022747, -86.252007],
                            ['Punto 5', 8.103289, -80.596013]
                        ];
                        foreach ($puntos as $p) {
                            echo "<tr class='table-row'>
                                    <td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900'>{$p[0]}</td>
                                    <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>{$p[1]}</td>
                                    <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>{$p[2]}</td>
                                    <td class='px-6 py-4 whitespace-nowrap text-right text-sm font-medium'>
                                        <button type='button' onclick=\"showMapModal('{$p[0]}', {$p[1]}, {$p[2]})\" class='text-blue-600 hover:text-blue-900 action-btn mr-3' title='Ver en mapa'>
                                            <i class='fas fa-map-marker-alt'></i>
                                        </button>
                                        <button type='button' class='text-red-600 hover:text-red-900 action-btn' title='Eliminar'>
                                            <i class='fas fa-trash-alt'></i>
                                        </button>
                                    </td>
                                </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </form>

        <!-- Pie de tabla -->
        <div class="bg-gray-50 px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
            <div class="flex-1 flex justify-between sm:hidden">
                <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    Anterior
                </button>
                <button class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    Siguiente
                </button>
            </div>
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-700">
                        Mostrando <span class="font-medium">1</span> a <span class="font-medium">5</span> de <span class="font-medium">5</span> clientes
                    </p>
                </div>
            </div>
        </div>
        </div>
    </main>

    <!-- MODAL DE MAPA -->
    <div id="mapModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white w-full max-w-2xl rounded-lg shadow-lg p-4 relative">
            <h2 class="text-xl font-semibold mb-2" id="mapTitle">Ubicación</h2>
            <div id="map" class="w-full h-96 rounded"></div>
            <button onclick="closeMapModal()" class="absolute top-2 right-2 text-gray-500 hover:text-red-600">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
    </div>

    <!-- SCRIPT DE MAPA -->
    <script src="<?= $base_url ?>JS/utils/table_clients.js"></script>
</body>

</html>