<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estiloventas2.css">
    <title>Ventas</title>
    <script>
        function buscarProducto() {
            const codigo = document.querySelector('input[name="cod_del_producto"]').value;
            if (codigo) {
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "buscar_producto.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        const respuesta = JSON.parse(xhr.responseText);
                        if (respuesta.success) {
                            document.querySelector('input[name="nomb_del_producto"]').value = respuesta.nombre;
                            document.querySelector('textarea[name="descripcion"]').value = respuesta.descripcion;
                            document.querySelector('input[name="cant_existente"]').value = respuesta.cantidad_existente;
                            document.querySelector('input[name="precio_unidad"]').value = respuesta.precio_unidad;
                            document.querySelector('input[name="precio_docena"]').value = respuesta.precio_docena;
                        } else {
                            alert("Producto no encontrado");
                        }
                    }
                };
                xhr.send("codigo=" + codigo);
            } else {
                alert("Por favor, ingresa el código del producto");
            }
        }

        function calcularCostoTotal() {
            const cantidad = parseInt(document.querySelector('input[name="cant_a_vender"]').value);
            const precioUnidad = parseFloat(document.querySelector('input[name="precio_unidad"]').value);
            const precioDocena = parseFloat(document.querySelector('input[name="precio_docena"]').value);
            let costoTotal = 0;

            if (cantidad < 12) {
                costoTotal = cantidad * precioUnidad;
            } else {
                costoTotal = cantidad * precioDocena;
            }

            document.querySelector('input[name="costo_total"]').value = costoTotal.toFixed(2);
            document.querySelector('input[name="monto_a_cancelar"]').value = costoTotal.toFixed(2);
            calcularCambio();
        }

        function calcularCambio() {
            const montoCancelar = parseFloat(document.querySelector('input[name="monto_a_cancelar"]').value);
            const montoRecibido = parseFloat(document.querySelector('input[name="monto_recibido"]').value);
            const cambio = montoRecibido - montoCancelar;

            document.querySelector('input[name="cambio"]').value = cambio.toFixed(2);
        }

        function limpiarFormulario() {
            document.querySelector('input[name="nombre_cliente"]').value = '';
            document.querySelector('input[name="cod_del_producto"]').value = '';
            document.querySelector('input[name="nomb_del_producto"]').value = '';
            document.querySelector('textarea[name="descripcion"]').value = '';
            document.querySelector('input[name="cant_existente"]').value = '';
            document.querySelector('input[name="cant_a_vender"]').value = '';
            document.querySelector('input[name="costo_total"]').value = '';
            document.querySelector('input[name="monto_a_cancelar"]').value = '';
            document.querySelector('input[name="monto_recibido"]').value = '';
            document.querySelector('input[name="cambio"]').value = '';
            document.querySelector('input[name="precio_unidad"]').value = '';
            document.querySelector('input[name="precio_docena"]').value = '';
        }
    </script>
</head>
<body>
    <div class="container">
        <form id="formulario-venta" action="procesar_venta.php" method="POST">
        <h1>Registro de Ventas</h1>
            <div class="form-row">
                <label>Nombre Cliente</label>
                <input type="text" name="nombre_cliente">
                <label>Cod. del Producto</label>
                <input type="text" name="cod_del_producto">
                <label>Nombre del Producto</label>
                <input type="text" name="nomb_del_producto" readonly>
            </div>
            <div class="form-row">
                <label>Descripción</label>
                <textarea name="descripcion" readonly></textarea>
                <label>Cantidad Existente</label>
                <input type="text" name="cant_existente" readonly>
                <label>Cantidad a Vender</label>
                <input type="text" name="cant_a_vender" oninput="calcularCostoTotal()">
            </div>
            <div class="form-row">
                <label>Precio Unidad</label>
                <input type="text" name="precio_unidad">
                <label>Precio Docena</label>
                <input type="text" name="precio_docena">
                <label>Costo Total</label>
                <input type="text" name="costo_total" readonly>
            </div>
            <div class="form-row">
                <label>Monto a Cancelar</label>
                <input type="text" name="monto_a_cancelar" readonly>
                <label>Monto Recibido</label>
                <input type="text" name="monto_recibido" oninput="calcularCambio()">
                <label>Cambio</label>
                <input type="text" name="cambio" readonly>
            </div>
            <div class="button-container">
                <button type="submit" class="btn">Agregar Venta</button>
                <button type="button" class="btn" onclick="buscarProducto()">Buscar</button>
                <button type="button" class="btn" onclick="limpiarFormulario()">Limpiar</button>
                <a href="inicio.php" class="btn">Regresar</a>
            </div>
        </form>
        
        <table id="reporte">
            <thead>
                <tr>
                    <th>Nombre del Cliente</th>
                    <th>Fecha de Venta</th>
                    <th>Cod. del Producto</th>
                    <th>Nombre de Producto</th>
                    <th>Cantidad Vendida</th>
                    <th>Costo Total</th>
                </tr>
            </thead>
            <tbody>
                <!-- Las filas de ventas se añadirán aquí -->
            </tbody>
        </table>
    </div>
</body>
</html>
