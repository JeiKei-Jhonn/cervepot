<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Control de Ventas - Cervecería Nacional Potosina</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <header>
        <form action="logout.php" method="post">
            <button type="submit">Cerrar Sesión</button>
        </form>
        <h2>Bienvenido al Sistema de Control de Ventas</h2>
        <h1>🍻Cervecería Nacional Potosina🍻</h1>
        <nav>
            <ul>
                <li><a href="registro.php">REGISTRO DE CLIENTES</a></li>
                <li><a href="ventas.php">VENTAS</a></li>
                <li class="dropdown">
                    <a href="#">INVENTARIO</a>
                    <ul class="dropdown-content">
                        <li><a href="productos-disponibles.php">PRODUCTOS DISPONIBLES</a></li>
                    </ul>
                </li>
                <li><a href="reporte.php">REPORTE</a></li>
                <li class="dropdown">
                    <a href="#">CONFIGURACIÓN</a>
                    <ul class="dropdown-content">
                        <li><a href="crear-nuevo-usuario.php">CREAR NUEVO USUARIO</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <footer>
        <div class="infinite-carousel">
            <div class="carousel-track">
                <img src="1.png" alt="Imagen 1">
                <img src="2.png" alt="Imagen 2">
                <img src="3.png" alt="Imagen 3">
                <img src="4.png" alt="Imagen 4">
                <img src="5.png" alt="Imagen 5">
                <img src="6.png" alt="Imagen 6">
                <img src="7.png" alt="Imagen 7">
                <img src="8.png" alt="Imagen 8">
                <img src="9.png" alt="Imagen 9">
                <img src="10.png" alt="Imagen 10">
                <img src="11.png" alt="Imagen 11">
                <img src="12.png" alt="Imagen 12">
                <img src="13.png" alt="Imagen 13">
                <img src="14.png" alt="Imagen 14">
                <img src="15.png" alt="Imagen 15">
                <img src="16.png" alt="Imagen 16">
                <img src="17.png" alt="Imagen 17">
                <img src="18.png" alt="Imagen 18">
                <img src="1.png" alt="Imagen 1">
                <img src="2.png" alt="Imagen 2">
                <img src="3.png" alt="Imagen 3">
                <img src="4.png" alt="Imagen 4">
                <img src="5.png" alt="Imagen 5">
                <img src="6.png" alt="Imagen 6">
                <img src="7.png" alt="Imagen 7">
                <img src="8.png" alt="Imagen 8">
                <img src="9.png" alt="Imagen 9">
                <img src="10.png" alt="Imagen 10">
                <img src="11.png" alt="Imagen 11">
                <img src="12.png" alt="Imagen 12">
                <img src="13.png" alt="Imagen 13">
                <img src="14.png" alt="Imagen 14">
                <img src="15.png" alt="Imagen 15">
                <img src="16.png" alt="Imagen 16">
                <img src="17.png" alt="Imagen 17">
                <img src="18.png" alt="Imagen 18">
            </div>
        </div>
    </footer>
</body>
</html>
