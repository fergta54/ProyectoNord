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
    <title>MARCAS</title>
    <script src="../recursos/js/bootstrap.min.js"></script>
    <script src="../recursos/js/jquery-3.7.0.min.js"></script>
</head>

<body>
    
    <center>
        <h1>
            MARCAS
        </h1>
        <br>
        <br>


        <table class="tablaMarcas table table-bordered">
            <thead>
                <tr><b>
                        <th class="td1">Nro</th>
                        <th class="td2">Marca</th>
                        <th class="td3">Descripcion</th>
                        <th class="td4">Estado</th>
                        
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
                        "SELECT id_marca as Nro,nombre_marca as Marca, descripcion_marca as Descripcion
                    ,estado_marca as Estado FROM marcas where estado_marca=1 order by id_marca"
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
                                    <td><center>' . ($fila[3] == 1 ? "Activo" : "Inactivo") . '</center></td>   
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
<script>
    function toggleButton() {
        var x = document.getElementsByClassName("ElementosEliminados");
        var y = document.getElementById("tituloEliminado");
        var button = document.getElementById("botonMostrar");

        for (var i = 0; i < x.length; i++) {
            if (x[i].style.display === "none") {
                x[i].style.display = "table-row";
                y.style.display = "table-row";
                y.colspan = 6;
                button.innerHTML = "Ocultar marcas desactivadas";
                var color = window.getComputedStyle(button, null)
                    .getPropertyValue("background-color");
                button.style.backgroundColor = "orange";
            } else {
                x[i].style.display = "none";
                y.style.display = "none";
                button.innerHTML = "Mostrar marcas desactivadas";
                var color = window.getComputedStyle(button, null)
                    .getPropertyValue("background-color");
                button.style.backgroundColor = "yellow";
            }
        }

    }
</script>

</html>