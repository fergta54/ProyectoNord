<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEDIDOS</title>
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
                            <th>Item Pedido</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

                        include('../conexion.php');
                        if ($conexion->connect_error) {
                            die("Conexión fallida: " . $conexion->connect_error);
                        }

                        $id_pedido = $_GET['id'];

                        $sql = "SELECT pedidos_items.id_pedido, pedidos_items.item_linea_id_pedido, productos.nombre_prod, pedidos_items.cantidad_pedido
                                FROM pedidos_items
                                INNER JOIN productos ON pedidos_items.id_prod = productos.id_prod
                                WHERE pedidos_items.id_pedido = $id_pedido";
                        $result = $conexion->query($sql);

                        if (!$result) {
                            die("Consulta inválida: " . $conexion->connect_error);
                        }

                        while ($row = $result->fetch_assoc()) {
                            echo "
                            <tr>
                                <td>" . $row['id_pedido'] . "</td>
                                <td>" . $row['item_linea_id_pedido'] . "</td>
                                <td>" . $row['nombre_prod'] . "</td>
                                <td>" . $row['cantidad_pedido'] . "</td>
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
