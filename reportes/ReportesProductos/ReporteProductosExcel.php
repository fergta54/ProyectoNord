<?php
header("Content-type: application/xls");
header("Content-Disposition: attachment; filename = ReporteProductos.xls");
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCTOS</title>
    <script src="../recursos/js/bootstrap.min.js"></script>
    <script src="../recursos/js/jquery-3.7.0.min.js"></script>
</head>

<body>
   
    <center>
        <h1>
            PRODUCTOS
        </h1>
        
        <br>


        <table class="tablaMarcas table table-bordered">
            <thead>
                <tr><b>
                        <th class="td1">Nro</th>
                        <th class="td2">Nombre</th>
                        <th class="td3">Descripcion</th>
                        <th class="td4">Precio</th>
                        <th class="td5">Categoria</th>
                        <th class="td5">Marca</th>
                        <th class="td5">Estado</th>
                        
                    </b>
                </tr>
            </thead>
            <tbody>
                <?php
                include('../../conexion.php');
                if (!$conexion) {
                    echo "Error en la conexion";
                } else {
                    //session_start();
                    $ejecutarConsulta = mysqli_query(
                        $conexion,
                        "SELECT pr.id_prod as id,nombre_prod,pr.imagen_prod,pr.precio_unit_compra,marcas.nombre_marca,                        
                        pr.descripcion_prod,cat.nombre_categoria,pr.estado_producto,pr.id_marca,pr.id_categoria                         
                        FROM productos pr inner join categorias cat on pr.id_categoria=cat.id_categoria
                            inner join marcas on pr.id_marca=marcas.id_marca
                         where estado_producto=1 order by id_prod"
                    )
                        or die("Problemas en la inserción" . mysqli_error($conexion));


                    $verFilas = mysqli_num_rows($ejecutarConsulta);
                    $fila = mysqli_fetch_array($ejecutarConsulta);
                    if (!$ejecutarConsulta) {
                        echo "Error en la consulta";
                    } else {

                        if ($verFilas < 1) {
                            echo "<tr><td colspan='6'>SIN REGISTROS</td></tr>";
                        } else {
                            for ($i = 0; $i < $verFilas; $i++) {
                                echo '
                                <tr>
                                    <td>' . ($i + 1) . '</td>
                                    <td>' . $fila[1] . '</td>
                                    <td>' . $fila[5] . '</td>
                                    <td>' . $fila[3] . '</td>
                                    <td>' . $fila[6] . '</td>
                                    <td>' . $fila[4] . '</td>
                                <td>
                                    <center>' . ($fila[7] == 1 ? "Activo" : "Inactivo") . '</center>
                                </td>

                                ';

                                ?>
                                
                                </tr>
                <?php

                                $fila = mysqli_fetch_array($ejecutarConsulta);
                            }
                        }
                    }
                }

                // ahora para los elementos ocultos

                ?>
                

            </tbody>
        </table>
        <br><br>

    </center>


</body>


</html>