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
            $descripcion=$_POST['descripcion'];
            $Cantidad_Existente=$_POST['Cantidad_Existente'];
            $Cantidad_Vendida=$_POST['Cantidad_Vendida'];
            $Precio_Unidad=$_POST['Precio_Unidad'];
            $Precio_Docena=$_POST['Precio_Docena'];

            include("conexion.php");
            $sql="insert into productos (codigo, nombre, descripcion, Cantidad_Existente, Cantidad_Vendida, Precio_Unidad, Precio_Docena)
            values ('".$codigo."', '".$nombre."', '".$descripcion."', '".$Cantidad_Existente."', '".$Cantidad_Vendida."', '".$Precio_Unidad."', '".$Precio_Docena."')";
            $resultado= mysqli_query ($conexion,$sql);
            if($resultado){
                echo "<script>
                    alert('Los datos fueron ingresados correctamente');
                    location.assign('productos-disponibles.php');
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
        <h1>Agregar Producto</h1>
        <label>Código</label>
        <input type="text" name="codigo"><br>
        <label>Nombre</label>
        <input type="text" name="nombre"><br>
        <label>Descripción</label>
        <input type="text" name="descripcion"><br>
        <label>Cantidad Existente</label>
        <input type="text" name="Cantidad_Existente"><br>
        <label>Cantidad Vendida</label>
        <input type="text" name="Cantidad_Vendida"><br>
        <label>Precio Unidad</label>
        <input type="text" name="Precio_Unidad"><br>
        <label>Precio Docena</label>
        <input type="text" name="Precio_Docena"><br>
        <div class="button-container">
            <input type="submit" name="enviar" value="AGREGAR">
            <a href="productos-disponibles.php" class="btn">REGRESAR</a>
        </div>
    </form>
    <?php
        }
    ?>
</body>
</html>
