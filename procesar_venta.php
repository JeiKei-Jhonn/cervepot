<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_cliente = $_POST['nombre_cliente'];
    $cod_del_producto = $_POST['cod_del_producto'];
    $nomb_del_producto = $_POST['nomb_del_producto'];
    $cant_a_vender = $_POST['cant_a_vender'];
    $costo_total = $_POST['costo_total'];

    // Validación de campos vacíos
    if(empty($nombre_cliente) || empty($cod_del_producto) || empty($nomb_del_producto) || empty($cant_a_vender) || empty($costo_total)) {
        $params = http_build_query($_POST);
        echo "<script>
                alert('Todos los campos son obligatorios.');
                window.location.href='ventas.php?$params';
              </script>";
        exit();
    }
    
    // Asumiendo que tienes un campo 'fecha_venta' que se llena automáticamente
    $fecha_venta = date("Y-m-d H:i:s");

    // Insertar los datos en el reporte de ventas
    $sql = "INSERT INTO reporte (nombre_cliente, fecha_venta, codigo, nombre_de_producto, cantidad, cos_total) VALUES ('$nombre_cliente', '$fecha_venta', '$cod_del_producto', '$nomb_del_producto', '$cant_a_vender', '$costo_total')";

    if (mysqli_query($conexion, $sql)) {
        // Actualizar la cantidad existente y la cantidad vendida en la tabla de productos
        $sql_update = "UPDATE productos SET cantidad_existente = cantidad_existente - $cant_a_vender, cantidad_vendida = cantidad_vendida + $cant_a_vender WHERE codigo = '$cod_del_producto'";
        
        if (mysqli_query($conexion, $sql_update)) {
            echo "<script>
                    alert('Venta registrada exitosamente y cantidades de productos actualizadas.');
                    window.location.href='ventas.php';
                  </script>";
        } else {
            echo "Error al actualizar las cantidades de productos: " . mysqli_error($conexion);
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }

    mysqli_close($conexion);
}
?>
