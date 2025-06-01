<?php 

    include_once '../utils/session.php'; 
    include_once '../utils/base_url.php';
?>
<!DOCTYPE html>
<html lang="es" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa de Calor | LogixSoft</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Maps API con librería de visualización -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjyM0CyjiksJbMk4SVzZTz-Uzn5QusoRE&libraries=visualization&callback=initMap" async defer></script>
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        #map {
            height: calc(100vh - 128px);
            width: 100%;
        }
        .heatmap-controls {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            padding: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.3);
            margin: 10px;
        }
        .heatmap-toggle {
            display: flex;
            align-items: center;
            cursor: pointer;
        }
        .nav-menu {
            background-color: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
        }
        .nav-menu a {
            transition: all 0.3s ease;
            position: relative;
        }
        .nav-menu a:hover {
            color: #0ea5e9;
        }
        .nav-menu a:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: #0ea5e9;
            transition: width 0.3s ease;
        }
        .nav-menu a:hover:after {
            width: 100%;
        }
    </style>
</head>
<body class="bg-gray-50 h-full">
    <!-- Barra de navegación superior -->
    <div class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <i class="fas fa-fire text-red-600 text-2xl mr-2"></i>
                        <span class="text-xl font-semibold text-gray-800">LogixSoft - Mapa de Calor</span>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="relative">
                        <input id="search-input" class="py-2 px-4 pr-10 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent" type="text" placeholder="Buscar ubicación...">
                        <div class="absolute right-3 top-2.5 text-gray-400">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menú de navegación -->
    <div class="nav-menu py-3">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <?php include '../components/menu.php'; ?>
        </div>
    </div>

    <!-- Mapa de Calor -->
    <div id="map"></div>

    <!-- Controles del mapa de calor -->
    <div id="heatmap-controls" class="heatmap-controls absolute top-20 left-0 z-10">
        <div class="heatmap-toggle" onclick="toggleHeatmap()">
            <i class="fas fa-fire mr-2 text-red-600"></i>
            <span>Mostrar/Ocultar Mapa de Calor</span>
        </div>
        <div class="mt-3">
            <label class="block text-sm font-medium text-gray-700">Intensidad</label>
            <input type="range" min="0" max="1" step="0.1" value="0.5" id="heatmap-intensity" onchange="changeIntensity(this.value)" class="w-full">
        </div>
        <div class="mt-2">
            <label class="block text-sm font-medium text-gray-700">Radio</label>
            <input type="range" min="10" max="50" step="5" value="20" id="heatmap-radius" onchange="changeRadius(this.value)" class="w-full">
        </div>
    </div>

    <script src="<?= $base_url?>JS/utils/heat_map.js"></script>
</body>
</html>