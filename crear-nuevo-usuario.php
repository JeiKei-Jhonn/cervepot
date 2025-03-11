<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilocrear.css">
    <title>Crear Nuevo Usuario</title>
</head>
<body>
    <?php
        if(isset($_POST['enviar'])){
            $nombre=$_POST['nombre'];
            $ci=$_POST['ci'];
            $celular=$_POST['celular'];
            $usuario=$_POST['usuario'];
            $contraseña=$_POST['contraseña'];
            $tipo_de_usuario=$_POST['tipo_de_usuario'];
            include("conexion.php");
            $sql="insert into crear (nombre, ci, celular, usuario, contraseña, tipo_de_usuario)
            values ('".$nombre."', '".$ci."', '".$celular."', '".$usuario."', '".$contraseña."', '".$tipo_de_usuario."')";
            $resultado= mysqli_query ($conexion,$sql);
            if($resultado){
                echo "<script>
                    alert('Los datos fueron ingresados correctamente');
                    location.assign('crear-nuevo-usuario.php');
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
        <h1>Crear Usuario</h1>
        <a href="tabla_usuarios.php" class="btn">Ver Usuarios</a>
        <label>NOMBRE</label>
        <input type="text" name="nombre"><br>
        <label>C.I.</label>
        <input type="text" name="ci"><br>
        <label>CELULAR</label>
        <input type="text" name="celular"><br>
        <label>USUARIO</label>
        <input type="text" name="usuario"><br>
        <label>CONTRASEÑA</label>
        <input type="text" name="contraseña"><br>
        <label>TIPO DE USUARIO</label>
        <select name="tipo_de_usuario">
            <option value="Administrador">Administrador</option>
            <option value="Cajas">Cajas</option>
            <option value="Almacen">Almacen</option>
        </select><br>
        <div class="button-container">
            <input type="submit" name="enviar" value="CREAR">
            <a href="inicio.php" class="btn">REGRESAR</a>
        </div>
    </form>
    <?php
        }
    ?>
</body>
</html>
