<?php
include("conexion.php");

$codigo = $_POST['codigo'];

$sql = "SELECT nombre, descripcion, cantidad_existente, precio_unidad, precio_docena FROM productos WHERE codigo = '$codigo'";
$resultado = mysqli_query($conexion, $sql);

if ($fila = mysqli_fetch_assoc($resultado)) {
    echo json_encode([
        'success' => true,
        'nombre' => $fila['nombre'],
        'descripcion' => $fila['descripcion'],
        'cantidad_existente' => $fila['cantidad_existente'],
        'precio_unidad' => $fila['precio_unidad'],
        'precio_docena' => $fila['precio_docena']
    ]);
} else {
    echo json_encode(['success' => false]);
}

mysqli_close($conexion);
?>
