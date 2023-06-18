<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            color: #333;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .total {
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php
// Incluir el archivo de conexión
include('../conexion.php');

// Obtener el id_venta del recibo
$id_venta = 1; // Ejemplo, debes tener el valor correcto

// Consulta para obtener los datos del recibo
$query_recibo = "SELECT v.id_venta, v.fecha_venta, c.nombre_cli, c.apellido_cli, c.correo_cli, c.direccion_cli, c.telf_cli
          FROM ventas v
          INNER JOIN clientes c ON v.id_cliente = c.id_cliente
          WHERE v.id_venta = $id_venta";

// Ejecutar la consulta del recibo
$resultado_recibo = mysqli_query($conexion, $query_recibo);

// Consulta para obtener los detalles de los productos vendidos
$query_detalles = "SELECT vi.item_linea_id_venta, p.nombre_prod, p.precio_unit_compra, vi.cantidad_venta
          FROM ventas_items vi
          INNER JOIN productos p ON vi.id_prod = p.id_prod
          WHERE vi.id_venta = $id_venta";

// Ejecutar la consulta de los detalles de los productos vendidos
$resultado_detalles = mysqli_query($conexion, $query_detalles);

// Verificar si se encontró el recibo solicitado
if (mysqli_num_rows($resultado_recibo) > 0 && mysqli_num_rows($resultado_detalles) > 0) {
    // Obtener los datos del recibo
    $recibo = mysqli_fetch_assoc($resultado_recibo);

    // Mostrar los detalles del recibo
    echo "<h2>Recibo de Venta #{$recibo['id_venta']}</h2>";
    echo "<p><strong>Fecha de Venta:</strong> {$recibo['fecha_venta']}</p>";
    echo "<p><strong>Cliente:</strong> {$recibo['nombre_cli']} {$recibo['apellido_cli']}</p>";
    echo "<p><strong>Correo:</strong> {$recibo['correo_cli']}</p>";
    echo "<p><strong>Dirección:</strong> {$recibo['direccion_cli']}</p>";
    echo "<p><strong>Teléfono:</strong> {$recibo['telf_cli']}</p>";

    // Mostrar los detalles de los productos vendidos
    echo "<h3>Detalles de la Venta</h3>";
    echo "<table>";
    echo "<tr><th>#</th><th>Producto</th><th>Precio Unitario</th><th>Cantidad</th><th>Subtotal</th></tr>";

    $totalVenta = 0;

    while ($detalle = mysqli_fetch_assoc($resultado_detalles)) {
        $subtotal = $detalle['precio_unit_compra'] * $detalle['cantidad_venta'];
        $totalVenta += $subtotal;

        echo "<tr>";
        echo "<td>{$detalle['item_linea_id_venta']}</td>";
        echo "<td>{$detalle['nombre_prod']}</td>";
        echo "<td>{$detalle['precio_unit_compra']}</td>";
        echo "<td>{$detalle['cantidad_venta']}</td>";
        echo "<td>{$subtotal}</td>";
        echo "</tr>";
    }

    echo "<tr><td colspan='4' class='total'><strong>Total:</strong></td><td class='total'>{$totalVenta}</td></tr>";
    echo "</table>";
} else {
    echo "No se encontró el recibo solicitado.";
}

// Cerrar la conexión
mysqli_close($conexion);
?>
</body>
</html>
