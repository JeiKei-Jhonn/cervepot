<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estiloregistro.css">
    <title>Productos</title>
</head>
<body>

<?php

    include("conexion.php");
    
    $sql = "SELECT * FROM productos";
    $resultado = mysqli_query($conexion, $sql);

    if (!$resultado) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }
?>
    <div class="container">
        <h1>Inventario</h1>
        <div class="button-container">
            <a href="agregarproducto.php" class="btn">Agregar Producto</a>
            <a href="inicio.php" class="btn">Regresar</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre del producto</th>
                    <th>Descripción</th>
                    <th>Cantidad existente</th>
                    <th>Cantidad vendida</th>
                    <th>Precio Unidad</th>
                    <th>Precio Docena</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    while ($filas = mysqli_fetch_assoc($resultado)) {
                ?>
                <tr>
                    <td><?php echo $filas['codigo']; ?></td>
                    <td><?php echo $filas['nombre']; ?></td>
                    <td><?php echo $filas['descripcion']; ?></td>
                    <td><?php echo $filas['Cantidad_Existente']; ?></td>
                    <td><?php echo $filas['Cantidad_Vendida']; ?></td>
                    <td><?php echo $filas['Precio_Unidad']; ?></td>
                    <td><?php echo $filas['Precio_Docena']; ?></td>
                    <td>
                        <a href="editarproducto.php?codigo=<?php echo $filas['codigo']; ?>" class="btn">Editar</a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
    
    <?php

        mysqli_close($conexion);
    ?>

</body>
</html>
