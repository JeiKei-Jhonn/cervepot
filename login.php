<?php
include 'conexion.php';
session_start();

$user = $_POST['username'];
$pass = $_POST['password'];

// Consulta para verificar las credenciales
$sql = "SELECT * FROM crear WHERE usuario='$user' AND contraseña='$pass'";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    // Credenciales correctas, iniciar sesión
    $_SESSION['username'] = $user;
    header("Location: inicio.php"); // Redirigir a inicio.php
} else {
    // Credenciales incorrectas, mostrar mensaje de error y redirigir
    echo "<script>alert('Usuario o contraseña incorrectos.'); window.location.href = 'index.html';</script>";
}

$conexion->close();
?>
