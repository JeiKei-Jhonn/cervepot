<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estiloagregarcliente.css">
    <title>Editar Cliente</title>
</head>
<body>
    <?php
        include("conexion.php");

        if(isset($_GET['codigo'])){
            $codigo = $_GET['codigo'];
            $sql = "SELECT * FROM registro WHERE codigo = '$codigo'";
            $resultado = mysqli_query($conexion, $sql);
            $fila = mysqli_fetch_assoc($resultado);
        }

        if(isset($_POST['actualizar'])){
            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre'];
            $celular = $_POST['celular'];
            $ci = $_POST['ci'];
            $direccion = $_POST['direccion'];
            $sql = "UPDATE registro SET nombre='$nombre', celular='$celular', ci='$ci', direccion='$direccion' WHERE codigo='$codigo'";
            $resultado = mysqli_query($conexion, $sql);
            if($resultado){
                echo "<script>
                    alert('Los datos fueron actualizados correctamente');
                    location.assign('registro.php');
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
        <h1>Editar Cliente</h1>
        <input type="hidden" name="codigo" value="<?php echo $fila['codigo']; ?>">
        <label>Nombre</label>
        <input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>"><br>
        <label>Celular</label>
        <input type="text" name="celular" value="<?php echo $fila['celular']; ?>"><br>
        <label>C.I.</label>
        <input type="text" name="ci" value="<?php echo $fila['ci']; ?>"><br>
        <label>Dirección</label>
        <input type="text" name="direccion" value="<?php echo $fila['direccion']; ?>"><br>
        <div class="button-container">
            <input type="submit" name="actualizar" value="ACTUALIZAR">
    
            <a href="registro.php" class="btn">REGRESAR</a>
        </div>
    </form>
    <?php
        }
    ?>
</body>
</html>
