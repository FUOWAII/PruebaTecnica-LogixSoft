// Configuración de Tailwind
tailwind.config = {
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', 'sans-serif'],
            },
            colors: {
                primary: {
                    50: '#f0f9ff',
                    100: '#e0f2fe',
                    200: '#bae6fd',
                    300: '#7dd3fc',
                    400: '#38bdf8',
                    500: '#0ea5e9',
                    600: '#0284c7',
                    700: '#0369a1',
                    800: '#075985',
                    900: '#0c4a6e',
                }
            }
        }
    }
}

let map;
let heatmap;
let markers = [];

function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        zoom: 6,
        center: { lat: 13.5, lng: -88.5 },
        styles: [
            {
                "featureType": "administrative",
                "elementType": "labels.text.fill",
                "stylers": [{ "color": "#444444" }]
            },
            {
                "featureType": "landscape",
                "elementType": "all",
                "stylers": [{ "color": "#f2f2f2" }]
            },
            {
                "featureType": "poi",
                "elementType": "all",
                "stylers": [{ "visibility": "off" }]
            },
            {
                "featureType": "road",
                "elementType": "all",
                "stylers": [
                    { "saturation": -100 },
                    { "lightness": 45 }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "all",
                "stylers": [{ "visibility": "simplified" }]
            },
            {
                "featureType": "transit",
                "elementType": "all",
                "stylers": [{ "visibility": "off" }]
            },
            {
                "featureType": "water",
                "elementType": "all",
                "stylers": [
                    { "color": "#d4e6f5" },
                    { "visibility": "on" }
                ]
            }
        ]
    });

    // Puntos de calor (los 5 que especificaste)
    const heatmapData = [
        { location: new google.maps.LatLng(13.705243, -89.24231), weight: 2 },  // Punto 1
        { location: new google.maps.LatLng(13.696674, -89.197927), weight: 1.5 }, // Punto 2
        { location: new google.maps.LatLng(14.692511, -87.86136), weight: 1 },   // Punto 3
        { location: new google.maps.LatLng(12.022747, -86.252007), weight: 0.8 }, // Punto 4
        { location: new google.maps.LatLng(8.103289, -80.596013), weight: 0.5 }   // Punto 5
    ];

    // Crear mapa de calor
    heatmap = new google.maps.visualization.HeatmapLayer({
        data: heatmapData,
        map: map,
        radius: 20,
        dissipating: true,
        opacity: 0.6
    });

    // Agregar marcadores para cada punto
    const puntos = [
        { nombre: "Punto 1", lat: 13.705243, lng: -89.24231 },
        { nombre: "Punto 2", lat: 13.696674, lng: -89.197927 },
        { nombre: "Punto 3", lat: 14.692511, lng: -87.86136 },
        { nombre: "Punto 4", lat: 12.022747, lng: -86.252007 },
        { nombre: "Punto 5", lat: 8.103289, lng: -80.596013 }
    ];

    puntos.forEach(punto => {
        const marker = new google.maps.Marker({
            position: { lat: punto.lat, lng: punto.lng },
            map: map,
            title: punto.nombre,
            icon: {
                url: "https://maps.google.com/mapfiles/ms/icons/red-dot.png"
            }
        });
        markers.push(marker);
    });

    // Buscador de lugares
    const input = document.getElementById('search-input');
    const searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);

    map.addListener('bounds_changed', () => {
        searchBox.setBounds(map.getBounds());
    });

    searchBox.addListener('places_changed', () => {
        const places = searchBox.getPlaces();
        if (places.length === 0) return;

        const bounds = new google.maps.LatLngBounds();
        places.forEach(place => {
            if (!place.geometry) return;
            if (place.geometry.viewport) {
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });
        map.fitBounds(bounds);
    });
}

// Funciones para controlar el mapa de calor
function toggleHeatmap() {
    heatmap.setMap(heatmap.getMap() ? null : map);
}

function changeIntensity(value) {
    heatmap.set('opacity', parseFloat(value));
}

function changeRadius(value) {
    heatmap.set('radius', parseInt(value));
}

// Manejar redimensionamiento
window.addEventListener('resize', () => {
    google.maps.event.trigger(map, 'resize');
});