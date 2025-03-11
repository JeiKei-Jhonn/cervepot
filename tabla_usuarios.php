<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilotablausuarios.css">
    <title>Usuarios</title>
</head>
<body>

<?php
    include("conexion.php");

    $sql = "SELECT * FROM crear";
    $resultado = mysqli_query($conexion, $sql);

    if (!$resultado) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }
?>
    <div class="container">
        <h1>Usuarios</h1>
        
        <!-- Formulario para eliminar clientes seleccionados -->
        <form action="eliminarusuario.php" method="post">
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>C.I.</th>
                        <th>Celular</th>
                        <th>Usuario</th>
                        <th>Contraseña</th>
                        <th>Tipo de Usuario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($filas = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td><?php echo $filas['nombre']; ?></td>
                        <td><?php echo $filas['ci']; ?></td>
                        <td><?php echo $filas['celular']; ?></td>
                        <td><?php echo $filas['usuario']; ?></td>
                        <td><?php echo str_repeat('*', strlen($filas['contraseña'])); ?></td>
                        <td><?php echo $filas['tipo_de_usuario']; ?></td>
                        <td>
                            <a href="editarusuario.php?ci=<?php echo $filas['ci']; ?>" class="btn">Editar</a>
                            <a href="eliminarusuario.php?ci=<?php echo $filas['ci']; ?>" class="btn">Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            
            <!-- Contenedor de botones dentro del formulario -->
            <div class="button-container">
                <a href="crear-nuevo-usuario.php" class="btn">Regresar</a>
            </div>
        </form>
    </div>

    <?php
        mysqli_close($conexion);
    ?>

</body>
</html>
