<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MARCAS</title>
    <link rel="stylesheet" href="../recursos/css/index.css">
    <link rel="stylesheet" href="../recursos/css/bootstrap.min.css">
    <script src="../recursos/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../recursos/css/cabecera.css">
    <script src="../recursos/js/jquery-3.7.0.min.js"></script>
</head>

<body>
    <?php
    include('../incluir/barraNav.php')
    ?>
    <center>
        <h1>
            MARCAS
        </h1>
        <button><a href="crearMarca.php" class="botonesProductos">Crear Marca</a></button>
        <button><a class="botonesProductos">Ad</a></button>
        <h1>REGISTRO DE MARCAS</h1><br>
        <button id="botonMostrar" onClick="toggleButton()" value="Mostrar Desactivados" style="background-color:yellow">Mostrar marcas desactivadas</button>
        <br>
        <br>


        <table class="tablaMarcas table table-bordered">
            <thead>
                <tr><b>
                        <th class="td1">Nro</td>
                        <th class="td2">Marca</td>
                        <th class="td3">Descripcion</td>
                        <th class="td4">Estado</td>
                        <th class="td5 td6" colspan="2">
                            <center>Acción</center>
                        </th>
                    </b>
                </tr>
            </thead>
            <tbody>
                <?php
                include('../conexion.php');
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
                            for ($i = 0; $i < $fila; $i++) {
                                echo '
                                <tr>
                                    <td>' . $i + 1 . '</td>
                                    <td>' . $fila[1] . '</td>
                                    <td>' . $fila[2] . '</td>
                                    <td><center>' . ($fila[3] == 1 ? "Activo" : "Inactivo") . '</center></td>   
                            ';
                ?>
                                <td>
                                    <center><button class="btn btn-warning"><a class="botonesProductos" href="editarMarca.php?id=<?php echo $fila[0] ?>">
                                                <i class="fas fa-marker">Editar</i>
                                            </a></button> </center>
                                </td>
                                <td>
                                    <center><button class="botonEditar btn btn-danger"><a class="botonesProductos" href=" eliminarMarca.php?id=<?php echo $fila[0] ?>">
                                                Cambiar estado a inactivo
                                            </a></button> </center>
                                </td>
                                </tr>
                <?php

                                $fila = mysqli_fetch_array($ejecutarConsulta);
                            }
                        }
                    }
                }

                // ahora para los elementos ocultos

                ?>
                <tr id="tituloEliminado" style="display:none;">
                    <td colspan="6"><b>Marcas desactivadas</b></td>
                </tr>
                <?php
                if (!$conexion) {
                    echo "Error en la conexion";
                } else {
                    //session_start();
                    $ejecutarConsulta2 = mysqli_query(
                        $conexion,
                        "SELECT id_marca as Nro,nombre_marca as Marca, descripcion_marca as Descripcion
                        ,estado_marca as Estado FROM marcas where estado_marca=2 order by id_marca"
                    )
                        or die("Problemas en la inserción" . mysqli_error($conexion));
                    //echo $_SESSION['IdRegistro'];
                    mysqli_close($conexion);
                    $verFilas2 = mysqli_num_rows($ejecutarConsulta2);
                    $fila2 = mysqli_fetch_array($ejecutarConsulta2);
                    if (!$ejecutarConsulta2) {
                        echo "Error en la consulta";
                    } else {

                        if ($verFilas2 < 1) {
                            echo '<tr class="ElementosEliminados" style="display:none;"><td colspan="6">SIN REGISTROS</td></tr>';
                        } else {
                            for ($i = 0; $i < $verFilas2; $i++) {
                                echo '
                                    <tr class="ElementosEliminados" style="display:none;">
                                        <td>' . $i + 1 . '</td>
                                        <td>' . $fila2[1] . '</td>
                                        <td>' . $fila2[2] . '</td>
                                        <td><center>' . ($fila2[3] == 1 ? "Activo" : "Inactivo")  . '</center></td>                                  
     
                                ';

                ?>

                                <td colspan="2">
                                    <center><button class="botonActivar btn btn-success"><a class="botonesProductos" href="activarMarca.php?id=<?php echo $fila2[0] ?>">
                                                Activar
                                            </a></button></center>
                                </td>
                                </tr>
                <?php

                                $fila2 = mysqli_fetch_array($ejecutarConsulta2);
                            }
                        }
                    }
                }
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