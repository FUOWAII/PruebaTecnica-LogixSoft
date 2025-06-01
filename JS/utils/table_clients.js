let map;
let marker;

function showMapModal(nombre, lat, lng) {
    document.getElementById('mapModal').classList.remove('hidden');
    document.getElementById('mapTitle').textContent = "Ubicación de " + nombre;

    setTimeout(() => {
        if (!map) {
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: lat, lng: lng },
                zoom: 13
            });
            marker = new google.maps.Marker({
                position: { lat: lat, lng: lng },
                map: map
            });
        } else {
            map.setCenter({ lat: lat, lng: lng });
            marker.setPosition({ lat: lat, lng: lng });
        }
    }, 200);
}

function closeMapModal() {
    document.getElementById('mapModal').classList.add('hidden');
}

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
