<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
</head>
<body>
    <?php
        include("conexion.php");

        if(isset($_GET['ci']) && !isset($_GET['confirmar'])){
            $ci = $_GET['ci'];
            echo "<script>
                if(confirm('¿Estás seguro de que deseas eliminar a este USUARIO?')){
                    window.location.href = 'eliminarusuario.php?confirmar=true&ci=$ci';
                } else {
                    window.location.href = 'tabla_usuarios.php';
                }
            </script>";
        }

        if(isset($_GET['confirmar']) && $_GET['confirmar'] == 'true' && isset($_GET['ci'])){
            $ci = $_GET['ci'];
            $sql = "DELETE FROM crear WHERE ci = '$ci'";
            $resultado = mysqli_query($conexion, $sql);
            if($resultado){
                echo "<script>
                    alert('El usuario fue eliminado correctamente');
                    location.assign('tabla_usuarios.php');
                </script>";
            }else{
                echo "<script>
                    alert('Error al eliminar usuario');
                    location.assign('tabla_usuarios.php');
                </script>";
            }
            mysqli_close($conexion);
        }
    ?>
</body>
</html>