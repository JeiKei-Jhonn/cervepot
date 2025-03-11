<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estiloagregarcliente.css">
    <title>Editar Producto</title>
</head>
<body>
    <?php
        include("conexion.php");

        if(isset($_GET['codigo'])){
            $codigo = $_GET['codigo'];
            $sql = "SELECT * FROM productos WHERE codigo = '$codigo'";
            $resultado = mysqli_query($conexion, $sql);
            $fila = mysqli_fetch_assoc($resultado);
        }

        if(isset($_POST['actualizar'])){
            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $Cantidad_Existente = $_POST['Cantidad_Existente'];
            $Cantidad_Vendida = $_POST['Cantidad_Vendida'];
            $Precio_Unidad = $_POST['Precio_Unidad'];
            $Precio_Docena = $_POST['Precio_Docena'];
            $sql = "UPDATE productos SET codigo= '$codigo', nombre='$nombre', descripcion='$descripcion', Cantidad_Existente='$Cantidad_Existente', Cantidad_Vendida='$Cantidad_Vendida', Precio_Unidad='$Precio_Unidad', Precio_Docena='$Precio_Docena' WHERE codigo='$codigo'";
            $resultado = mysqli_query($conexion, $sql);
            if($resultado){
                echo "<script>
                    alert('Los datos fueron actualizados correctamente');
                    location.assign('productos-disponibles.php');
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
        <h1>Editar Producto</h1>
        <input type="hidden" name="codigo" value="<?php echo $fila['codigo']; ?>">
        <label>Código</label>
        <input type="text" name="codigo" value="<?php echo $fila['codigo']; ?>"><br>
        <label>Nombre</label>
        <input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>"><br>
        <label>Descripción</label>
        <input type="text" name="descripcion" value="<?php echo $fila['descripcion']; ?>"><br>
        <label>Cantidad Existente</label>
        <input type="text" name="Cantidad_Existente" value="<?php echo $fila['Cantidad_Existente']; ?>"><br>
        <label>Cantidad Vendida</label>
        <input type="text" name="Cantidad_Vendida" value="<?php echo $fila['Cantidad_Vendida']; ?>"><br>
        <label>Precio Unidad</label>
        <input type="text" name="Precio_Unidad" value="<?php echo $fila['Precio_Unidad']; ?>"><br>
        <label>Precio Docena</label>
        <input type="text" name="Precio_Docena" value="<?php echo $fila['Precio_Docena']; ?>"><br>
        <div class="button-container">
            <input type="submit" name="actualizar" value="ACTUALIZAR">
    
            <a href="productos-disponibles.php" class="btn">REGRESAR</a>
        </div>
    </form>
    <?php
        }
    ?>
</body>
</html>
