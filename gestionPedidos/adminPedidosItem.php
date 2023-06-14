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
                <h1>Administracion de Pedidos</h1>
                <br><br>
                <button id="botonMostrar" class="botonMostrarOcultos" onClick="toggleButton()" value="Mostrar Desactivados">
                    <a href="#mostrarInhabil">Mostrar inhabilitadas</a></button>
                <br>
                <br>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>ITEM</th>
                            <th>PEDIDO</th>
                            <th>PRODUCTO</th>
                            <th>CANTIDAD</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('../conexion.php');
                        if ($conexion->connect_error) {
                            die("Conexión fallida: " . $conexion->connect_error);
                        }

                        $sql = "SELECT * FROM pedidos_items
                                INNER JOIN productos ON pedidos_items.id_prod  = productos.id_prod  
                                INNER JOIN pedidos ON pedidos_items.id_pedido  = pedidos.id_pedido  
                                where estado_compra=1  ORDER BY item_linea_id_pedido";
                        $result = $conexion->query($sql);

                        if (!$result) {
                            die("Consulta inválida: " . $conexion->connect_error);
                        }

                        while ($row = $result->fetch_assoc()) {
                            echo "
                            <tr>
                                <td>" . $row['item_linea_id_pedido'] . "</td>
                                <td>" . $row['id_pedido'] . "</td>
                                <td>" . $row['nombre_prod'] . "</td>
                                <td>" . $row['cantidad_pedido'] . "</td>
                                <td>" . $row['estado_compra'] . "</td>
                                <td>
                                    <a class='btn btn-primary btn-warning btn-sm' href='editarPedidoItem.php?item_linea_id_pedido=$row[item_linea_id_pedido]'>Editar</a>
                                    <a class='btn btn-danger btn-warning' href='eliminarPedidoItem.php?item_linea_id_pedido=$row[item_linea_id_pedido]'>Inhabilitar</a>                                
                                
                                </td>
                                
                            </tr>";
                        }?>
                        <tr id="tituloEliminado" style="display:none;">
                            <td colspan="6" id="mostrarInhabil"><b>Pedidos Desactivados</b></td>
                        </tr>
                        <?php
                            include('../conexion.php');
                            if ($conexion->connect_error) {
                                die("Conexión fallida: " . $conexion->connect_error);
                            }

                            $sqlInhabilitados = "SELECT * FROM pedidos_items
                            INNER JOIN productos ON pedidos_items.id_prod  = productos.id_prod  
                            INNER JOIN pedidos ON pedidos_items.id_pedido  = pedidos.id_pedido  
                            where estado_compra=2  ORDER BY item_linea_id_pedido";
                            $resultInhabilitados = $conexion->query($sqlInhabilitados);

                            if (!$resultInhabilitados) {
                                die("Consulta inválida: " . $conexion->connect_error);
                            }

                            while ($rowInhabilitados = $resultInhabilitados->fetch_assoc()) {
                                echo "
                                <tr class='trInhabilitados' style='display:none;'>
                                    <td>" . $rowInhabilitados['item_linea_id_pedido'] . "</td>
                                    <td>" . $rowInhabilitados['id_pedido'] . "</td>
                                    <td>" . $rowInhabilitados['nombre_prod'] . "</td>
                                    <td>" . $rowInhabilitados['cantidad_pedido'] . "</td>
                                    <td>" . $rowInhabilitados['estado_compra'] . "</td>

                                    <td>
                                        <a class='btn btn-success btn-success' href='activarPedidoItem.php?item_linea_id_pedido=$rowInhabilitados[item_linea_id_pedido]'>Habilitar</a>                                
                                    </td>
                                </tr>";
                            }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
    function toggleButton() {
        var botonMostrar = document.getElementById("botonMostrar");
        var filasInhabilitadas = document.getElementsByClassName("trInhabilitados");
        var tituloEliminado = document.getElementById("tituloEliminado");

        if (botonMostrar.value == "Mostrar Desactivados") {
            botonMostrar.value = "Ocultar Desactivados";
            botonMostrar.innerHTML = "Ocultar inhabilitadas";
            for (var i = 0; i < filasInhabilitadas.length; i++) {
                filasInhabilitadas[i].style.display = "table-row";
            }
            tituloEliminado.style.display = "table-row";
        } else {
            botonMostrar.value = "Mostrar Desactivados";
            botonMostrar.innerHTML = "Mostrar inhabilitadas";
            for (var i = 0; i < filasInhabilitadas.length; i++) {
                filasInhabilitadas[i].style.display = "none";
            }
            tituloEliminado.style.display = "none";
        }
    }
</script>
</body>

</html>
