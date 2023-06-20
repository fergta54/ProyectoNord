<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Pedidos</title>
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
                            <th>ID</th>
                            <th>Fecha Pedido</th>
                            <th>Proveedor</th>
                            <th>Situacion</th>
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

                        $sql = "SELECT * FROM pedidos 
                                INNER JOIN estados ON pedidos.estado_pedido = estados.id_estado 
                                INNER JOIN proveedores ON pedidos.id_proveedor = proveedores.id_proveedor 
                                INNER JOIN situacion_pedidos ON pedidos.id_situacion_pedido = situacion_pedidos.id_situacion_pedido  
                                where estado_pedido=1 ORDER BY estado_prov";
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
                                <td>" . $row['estado_descripcion'] . "</td>

                                <td>
                                    <a class='btn btn-primary btn-warning' href='editarPedidos.php?id_pedido=$row[id_pedido]'>Editar</a>                                
                                    <a class='btn btn-danger btn-warning' href='eliminarPedido.php?id_pedido=$row[id_pedido]'>Inhabilitar</a>                                
                                </td>
                            </tr>";
                        }

                        // Ahora para los elementos ocultos
                        ?>
                        <tr id="tituloEliminado" style="display:none;">
                            <td colspan="6" id="mostrarInhabil"><b>Pedidos Desactivados</b></td>
                        </tr>
                        <?php
                            include('../conexion.php');
                            if ($conexion->connect_error) {
                                die("Conexión fallida: " . $conexion->connect_error);
                            }

                            $sqlInhabilitados = "SELECT * FROM pedidos 
                                                INNER JOIN estados ON pedidos.estado_pedido = estados.id_estado 
                                                INNER JOIN proveedores ON pedidos.id_proveedor = proveedores.id_proveedor 
                                                INNER JOIN situacion_pedidos ON pedidos.id_situacion_pedido = situacion_pedidos.id_situacion_pedido  
                                                where estado_pedido=2 ORDER BY estado_prov";
                            $resultInhabilitados = $conexion->query($sqlInhabilitados);

                            if (!$resultInhabilitados) {
                                die("Consulta inválida: " . $conexion->connect_error);
                            }

                            while ($rowInhabilitados = $resultInhabilitados->fetch_assoc()) {
                                echo "
                                <tr class='trInhabilitados' style='display:none;'>
                                    <td>" . $rowInhabilitados['id_pedido'] . "</td>
                                    <td>" . $rowInhabilitados['fecha_pedido'] . "</td>
                                    <td>" . $rowInhabilitados['razonSocial_prov'] . "</td>
                                    <td>" . $rowInhabilitados['situacion_pedido'] . "</td>
                                    <td>" . $rowInhabilitados['estado_descripcion'] . "</td>

                                    <td>
                                        <a class='btn btn-success btn-success' href='activarPedido.php?id_pedido=$rowInhabilitados[id_pedido]'>Habilitar</a>                                
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
