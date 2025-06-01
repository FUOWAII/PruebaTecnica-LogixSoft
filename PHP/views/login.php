<?php
session_start();

require_once '../utils/base_url.php';

if (isset($_SESSION['usuario'])) {
    header('Location: mapa.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <!-- Estilos personalizados -->
    <link href="<?= $base_url ?>CSS/views/login.css" rel="stylesheet" />
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center bg-auth">
    <div class="animate__animated animate__fadeIn w-full max-w-md px-6">
        <div class="bg-white rounded-xl shadow-2xl overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-blue-500 p-6 text-center">
                <h1 class="text-2xl font-bold text-white">Bienvenido</h1>
                <p class="text-blue-100 mt-1">Ingresa tus credenciales para continuar</p>
            </div>

            <form id="loginForm" method="POST" action="../controllers/validate.php" class="p-8 space-y-6">
                <div class="space-y-4">
                    <div>
                        <label for="usuario" class="block text-sm font-medium text-gray-700 mb-1">Usuario</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input
                                type="text"
                                name="usuario"
                                id="usuario"
                                placeholder="Ingresa tu usuario"
                                required
                                class="input-focus pl-10 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200 py-2 px-3" />
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input
                                type="password"
                                name="password"
                                id="password"
                                placeholder="Ingresa tu contraseña"
                                required
                                class="input-focus pl-10 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200 py-2 px-3" />
                        </div>
                    </div>
                </div>

                <div>
                    <button
                        type="submit"
                        class="group relative w-full flex justify-center items-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200 transform hover:scale-105 shadow-md">
                        <span class="absolute left-3 flex items-center">
                            <svg
                                class="h-5 w-5 text-blue-300 group-hover:text-blue-200 transition duration-200"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true">
                                <path
                                    fill-rule="evenodd"
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        Iniciar Sesión
                    </button>
                </div>
            </form>

            <div class="bg-gray-50 px-8 py-4 rounded-b-xl text-center">
                <p class="text-sm text-gray-600">
                    ¿No tienes una cuenta?
                    <a href="#" class="font-medium text-blue-600 hover:text-blue-500 transition duration-150">Regístrate</a>
                </p>
            </div>
        </div>

        <div class="mt-6 text-center text-sm text-gray-500">
            <p>© 2023 LogixSoft. Todos los derechos reservados.</p>
        </div>
    </div>
</body>

<!-- Scripts -->
<script src="<?= $base_url ?>JS/server/server.js"></script>

</html>