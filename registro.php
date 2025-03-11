<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estiloregistro.css">
    <title>Registro de Clientes</title>
</head>
<body>

<?php
    include("conexion.php");

    $sql = "SELECT * FROM registro";
    $resultado = mysqli_query($conexion, $sql);

    if (!$resultado) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }
?>
    <div class="container">
        <h1>Registro de Clientes</h1>
        
        <!-- Formulario para eliminar clientes seleccionados -->
        <form action="eliminarcliente.php" method="post">
            <table>
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nombre Completo</th>
                        <th>Celular</th>
                        <th>C.I.</th>
                        <th>Dirección</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($filas = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td><?php echo $filas['codigo']; ?></td>
                        <td><?php echo $filas['nombre']; ?></td>
                        <td><?php echo $filas['celular']; ?></td>
                        <td><?php echo $filas['ci']; ?></td>
                        <td><?php echo $filas['direccion']; ?></td>
                        <td>
                            <a href="editarcliente.php?codigo=<?php echo $filas['codigo']; ?>" class="btn">Editar</a>
                            <a href="eliminarcliente.php?codigo=<?php echo $filas['codigo']; ?>" class="btn">Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            
            <!-- Contenedor de botones dentro del formulario -->
            <div class="button-container">
                <a href="agregarcliente.php" class="btn">Agregar Cliente</a>
                <a href="inicio.php" class="btn">Regresar</a>
            </div>
        </form>
    </div>

    <?php
        mysqli_close($conexion);
    ?>

</body>
</html>
