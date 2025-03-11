<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles2.css">
    <title>Eliminar Cliente</title>
</head>
<body>
    <?php
        include("conexion.php");
        if(isset($_GET['codigo'])){
            $codigo = $_GET['codigo'];
            $sql = "DELETE FROM registro WHERE codigo = '$codigo'";
            $resultado = mysqli_query($conexion, $sql);
            if($resultado){
                echo "<script>
                    alert('El cliente fue eliminado correctamente');
                    location.assign('registro.php');
                </script>";
            }else{
                echo "<script>
                    alert('Error al eliminar cliente');
                </script>";
            }
            mysqli_close($conexion);
        }
    ?>
</body>
</html>
