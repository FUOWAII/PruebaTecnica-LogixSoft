function initMap() {
    const map = new google.maps.Map(document.getElementById('map'), {
        zoom: 6,
        center: { lat: 13.705243, lng: -89.24231 }
    });

    const clientes = [
        ["Punto 1", 13.705243, -89.24231],
        ["Punto 2", 13.696674, -89.197927],
        ["Punto 3", 14.692511, -87.86136],
        ["Punto 4", 12.022747, -86.252007],
        ["Punto 5", 8.103289, -80.596013]
    ];

    const markers = [];
    clientes.forEach(([nombre, lat, lng]) => {
        const marker = new google.maps.Marker({
            position: { lat, lng },
            map,
            title: nombre
        });
        markers.push(marker);
    });
}

window.onload = initMap;


let map;
let markers = [];
let infoWindow;

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 6,
        center: {
            lat: 13.705243,
            lng: -89.24231
        },
        styles: [{
            "featureType": "administrative",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#444444"
            }]
        },
        {
            "featureType": "landscape",
            "elementType": "all",
            "stylers": [{
                "color": "#f2f2f2"
            }]
        },
        {
            "featureType": "poi",
            "elementType": "all",
            "stylers": [{
                "visibility": "off"
            }]
        },
        {
            "featureType": "road",
            "elementType": "all",
            "stylers": [{
                "saturation": -100
            },
            {
                "lightness": 45
            }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "all",
            "stylers": [{
                "visibility": "simplified"
            }]
        },
        {
            "featureType": "road.arterial",
            "elementType": "labels.icon",
            "stylers": [{
                "visibility": "off"
            }]
        },
        {
            "featureType": "transit",
            "elementType": "all",
            "stylers": [{
                "visibility": "off"
            }]
        },
        {
            "featureType": "water",
            "elementType": "all",
            "stylers": [{
                "color": "#d4e6f5"
            },
            {
                "visibility": "on"
            }
            ]
        }
        ]
    });

    infoWindow = new google.maps.InfoWindow();

    const clientes = [
        ["Punto 1", 13.705243, -89.24231, "San Salvador", "Calle Principal #123"],
        ["Punto 2", 13.696674, -89.197927, "Santa Tecla", "Avenida Secundaria #456"],
        ["Punto 3", 14.692511, -87.86136, "Honduras", "Boulevard Central #789"],
        ["Punto 4", 12.022747, -86.252007, "Nicaragua", "Calle Norte #101"],
        ["Punto 5", 8.103289, -80.596013, "Panamá", "Avenida Sur #202"]
    ];

    clientes.forEach(([nombre, lat, lng, ciudad, direccion]) => {
        const marker = new google.maps.Marker({
            position: {
                lat,
                lng
            },
            map,
            title: nombre,
            icon: {
                url: "https://maps.google.com/mapfiles/ms/icons/blue-dot.png"
            }
        });

        markers.push(marker);

        marker.addListener('click', () => {
            infoWindow.setContent(`
                        <div class="marker-info">
                            <h3 class="marker-title">${nombre}</h3>
                            <p class="text-sm"><strong>Ciudad:</strong> ${ciudad}</p>
                            <p class="text-sm"><strong>Dirección:</strong> ${direccion}</p>
                            <div class="mt-2">
                                <button onclick="window.location.href='cliente-detalle.php?id=${nombre.toLowerCase().replace(' ', '-')}'" 
                                    class="text-xs bg-primary-500 hover:bg-primary-600 text-white px-2 py-1 rounded">
                                    Ver detalles
                                </button>
                            </div>
                        </div>
                    `);
            infoWindow.open(map, marker);
        });
    });

    // Buscador de lugares
    const input = document.getElementById('pac-input');
    const searchBox = new google.maps.places.SearchBox(input);

    map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);

    map.addListener('bounds_changed', () => {
        searchBox.setBounds(map.getBounds());
    });

    searchBox.addListener('places_changed', () => {
        const places = searchBox.getPlaces();

        if (places.length === 0) {
            return;
        }

        const bounds = new google.maps.LatLngBounds();

        places.forEach(place => {
            if (!place.geometry) {
                return;
            }

            if (place.geometry.viewport) {
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });

        map.fitBounds(bounds);
    });
}

function flyTo(lat, lng) {
    map.setZoom(14);
    map.panTo({
        lat,
        lng
    });
}

// Manejar redimensionamiento
window.addEventListener('resize', () => {
    google.maps.event.trigger(map, 'resize');
});



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
