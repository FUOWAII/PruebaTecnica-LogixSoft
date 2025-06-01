<!-- index.php -->
<?php session_start(); if (isset($_SESSION['usuario'])) header('Location: mapa.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <form method="POST" action="validate.php">
            <input type="text" name="usuario" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>
