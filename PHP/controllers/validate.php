<?php
session_start();

// Configuración para devolver JSON
header('Content-Type: application/json');

$usuario = $_POST['usuario'] ?? '';
$password = $_POST['password'] ?? '';

// Validación simple (deberías usar password_hash() en producción)
if ($usuario === 'prueba' && $password === '12345') {
    $_SESSION['usuario'] = $usuario;
    
    // Respuesta JSON para éxito
    echo json_encode([
        'success' => true,
        'redirect' => '../views/maps.php'
    ]);
    exit();
} else {
    // Respuesta JSON para error
    http_response_code(401); // Unauthorized
    echo json_encode([
        'success' => false,
        'message' => 'Credenciales incorrectas'
    ]);
    exit();
}