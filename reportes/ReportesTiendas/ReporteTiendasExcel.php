<?php
header("Content-type: application/xls");
header("Content-Disposition: attachment; filename = ReporteTiendas.xls");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIENDAS</title>
    <script src="../recursos/js/bootstrap.min.js"></script>
    <script src="../recursos/js/jquery-3.7.0.min.js"></script>
    <script src="../recursos/js/botonMostrar.js"></script>
</head>

<body>
    
            <div class="container my-5 text-center">
                <h1>Administración de Tiendas</h1>
                <br>

                <table class="tablaCategorias table table-bordered">
                    <thead class="thead thead-dark fijadorCabecera">
                        <tr>
                            <th class="td1">Nro</th>
                            <th class="td2">Nombre</th>
                            <th class="td3">Dirección</th>
                            <th class="td4">Latitud</th>
                            <th class="td4">Longitud</th>
                            <th class="td5">Estado</th>
                            
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
                                "SELECT id_tienda,nombre_tienda,direccion_tienda,latitud_tienda,longitud_tienda,
                        foto_tienda,estado_tienda 
                        FROM tiendas  order by estado_tienda, nombre_tienda"
                            )
                                or die("Problemas en la inserción" . mysqli_error($conexion));
                            //echo $_SESSION['IdRegistro'];
                            // mysqli_close($conexion);
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
                                    <td>' . $fila[2] . '</td>
                                    <td>' . $fila[3] . '</td>
                                    <td>' . $fila[4] . '</td>
                                    
                                    <td>
                                        <center>' . ($fila[6] == 1 ? "Activo" : "Inactivo") . '</center>
                                    </td>
                                </tr>
                                ';

                                        ?>
                                        
                                        
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

            </div>
        
</body>


</html>