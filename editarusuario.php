<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estiloeditarusuario.css">
    <title>Editar Usuario</title>
</head>
<body>
    <?php
        include("conexion.php");

        if(isset($_GET['ci'])){
            $ci = $_GET['ci'];
            $sql = "SELECT * FROM crear WHERE ci = '$ci'";
            $resultado = mysqli_query($conexion, $sql);
            $fila = mysqli_fetch_assoc($resultado);
        }

        if(isset($_POST['actualizar'])){
            $nombre = $_POST['nombre'];
            $ci = $_POST['ci'];
            $celular = $_POST['celular'];
            $usuario = $_POST['usuario'];
            $contraseña = $_POST['contraseña'];
            $tipo_de_usuario = $_POST['tipo_de_usuario'];

            $sql = "UPDATE crear SET nombre='$nombre', celular='$celular', usuario='$usuario', contraseña='$contraseña', tipo_de_usuario='$tipo_de_usuario' WHERE ci='$ci'";
            $resultado = mysqli_query($conexion, $sql);
            if($resultado){
                echo "<script>
                    alert('Los datos fueron actualizados correctamente');
                    location.assign('tabla_usuarios.php');
                </script>";
            }else{
                echo "<script>
                    alert('Error al actualizar los datos');
                </script>";
            }
            mysqli_close($conexion);
        }else{
    ?>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <h1>Editar Usuario</h1>
        <input type="hidden" name="ci" value="<?php echo $fila['ci']; ?>">
        <label>Nombre</label>
        <input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>"><br>
        <label>Celular</label>
        <input type="text" name="celular" value="<?php echo $fila['celular']; ?>"><br>
        <label>Usuario</label>
        <input type="text" name="usuario" value="<?php echo $fila['usuario']; ?>"><br>
        <label>Contraseña</label>
        <input type="text" name="contraseña" value="<?php echo $fila['contraseña']; ?>"><br>
        <label>Tipo de Usuario</label>
        <input type="text" name="tipo_de_usuario" value="<?php echo $fila['tipo_de_usuario']; ?>"><br>
        <div class="button-container">
            <input type="submit" name="actualizar" value="ACTUALIZAR">
    
            <a href="tabla_usuarios.php" class="btn">REGRESAR</a>
        </div>
    </form>
    <?php
        }
    ?>
</body>
</html>
