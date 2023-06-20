<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Pedidos</title>
    <link rel="stylesheet" href="../recursos/css/index.css">
    <link rel="stylesheet" href="../recursos/css/bootstrap.min.css">
    <script src="../recursos/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../recursos/css/cabecera.css">
    <script src="../recursos/js/jquery-3.7.0.min.js"></script>
</head>

<body>
    <div class="row">
        <div class="col-2">
            <?php include('../incluir/asideNavAdmin.php'); ?>
        </div>
        <div class="col-10">
            <div class="container my-5 text-center">
                <h1>Lista de Pedidos</h1>
                <br><br>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Fecha Pedido</th>
                            <th>Proveedor</th>
                            <th>Situacion</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('../conexion.php');
                        if ($conexion->connect_error) {
                            die("Conexión fallida: " . $conexion->connect_error);
                        }

                        $sql = "SELECT * FROM pedidos 
                                INNER JOIN estados ON pedidos.estado_pedido = estados.id_estado 
                                INNER JOIN proveedores ON pedidos.id_proveedor = proveedores.id_proveedor 
                                INNER JOIN situacion_pedidos ON pedidos.id_situacion_pedido = situacion_pedidos.id_situacion_pedido  
                                ORDER BY ID_PEDIDO";
                        $result = $conexion->query($sql);

                        if (!$result) {
                            die("Consulta inválida: " . $conexion->connect_error);
                        }

                        while ($row = $result->fetch_assoc()) {
                            echo "
                            <tr>
                                <td>" . $row['id_pedido'] . "</td>
                                <td>" . $row['fecha_pedido'] . "</td>
                                <td>" . $row['razonSocial_prov'] . "</td>
                                <td>" . $row['situacion_pedido'] . "</td>
                                <td><a class='btn btn-primary btn-warning btn-sm' href='verPedidosItem.php?id=" . $row['id_pedido'] . "'>Ver</a></td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
