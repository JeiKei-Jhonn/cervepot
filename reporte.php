<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estiloreporte.css">
    <title>Reporte de Ventas</title>
</head>
<body>

<?php

    include("conexion.php");
    
    // Verifica si se han enviado datos de búsqueda
    $nombre_cliente = isset($_POST['nombre_cliente']) ? $_POST['nombre_cliente'] : '';
    $fecha_venta = isset($_POST['fecha_venta']) ? $_POST['fecha_venta'] : '';

    // Modifica la consulta SQL para incluir filtros de búsqueda
    $sql = "SELECT * FROM reporte WHERE nombre_cliente LIKE '%$nombre_cliente%' AND fecha_venta LIKE '%$fecha_venta%'";
    $resultado = mysqli_query($conexion, $sql);

    if (!$resultado) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }
?>
    <div class="container">
        <h1>Reporte de Ventas</h1>

        <div class="button-container">
            <form method="POST" action="">
                <input type="text" name="nombre_cliente" placeholder="Nombre del Cliente" value="<?php echo $nombre_cliente; ?>">
                <input type="date" name="fecha_venta" value="<?php echo $fecha_venta; ?>">
                <button type="submit" class="btn">Buscar Venta(s)</button>
                <a href="inicio.php" class="btn">Regresar</a>
            </form>
     
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>Nombre del Cliente</th>
                    <th>Fecha de Venta</th>
                    <th>Cod. del Producto</th>
                    <th>Nombre de Producto</th>
                    <th>Cantidad Vendida</th>
                    <th>Costo Total</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    while ($filas = mysqli_fetch_assoc($resultado)) {
                ?>
                <tr>
                    <td><?php echo $filas['nombre_cliente']; ?></td>
                    <td><?php echo $filas['fecha_venta']; ?></td>
                    <td><?php echo $filas['codigo']; ?></td>
                    <td><?php echo $filas['nombre_de_producto']; ?></td>
                    <td><?php echo $filas['cantidad']; ?></td>
                    <td><?php echo $filas['cos_total']; ?></td>
         
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
