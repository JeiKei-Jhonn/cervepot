<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estiloagregarcliente.css">
    <title>Agregar</title>
</head>
<body>
    <?php
        if(isset($_POST['enviar'])){
            $codigo=$_POST['codigo'];
            $nombre=$_POST['nombre'];
            $celular=$_POST['celular'];
            $ci=$_POST['ci'];
            $direccion=$_POST['direccion'];
            include("conexion.php");
            $sql="insert into registro (codigo, nombre, celular, ci, direccion)
            values ('".$codigo."', '".$nombre."', '".$celular."', '".$ci."', '".$direccion."')";
            $resultado= mysqli_query ($conexion,$sql);
            if($resultado){
                echo "<script>
                    alert('Los datos fueron ingresados correctamente');
                    location.assign('registro.php');
                </script>";
            }else{
                echo "<script>
                    alert('Error al ingresar datos');
                </script>";
            }
            mysqli_close($conexion);
        }else{
    ?>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <h1>Agregar Cliente</h1>
        <label>Código</label>
        <input type="text" name="codigo"><br>
        <label>Nombre</label>
        <input type="text" name="nombre"><br>
        <label>Celular</label>
        <input type="text" name="celular"><br>
        <label>C.I.</label>
        <input type="text" name="ci"><br>
        <label>Dirección</label>
        <input type="text" name="direccion"><br>
        <div class="button-container">
            <input type="submit" name="enviar" value="AGREGAR">
            <a href="registro.php" class="btn">REGRESAR</a>
        </div>
    </form>
    <?php
        }
    ?>
</body>
</html>
