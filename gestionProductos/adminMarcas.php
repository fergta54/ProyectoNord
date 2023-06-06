<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCTOS</title>
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
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Nro</td>
                    <td>Marca</td>
                    <td>Descripcion</td>
                    <td>Estado</td>
                    <td colspan="2">
                        <center>Acción</center>
                    </td>
                </tr>
            </thead>
            <tbody>
                <?php
                include("../conexion.php");

                if (!$conexion) {
                    echo "Error en la conexion";
                } else {
                    //session_start();
                    $ejecutarConsulta = mysqli_query(
                        $conexion,
                        "SELECT id_marca as Nro,nombre_marca as Marca, descripcion_marca as Descripcion
                    ,estado_marca as Estado FROM marcas where estado_marca=1"
                    )
                        or die("Problemas en la inserción" . mysqli_error($conexion));
                    //echo $_SESSION['IdRegistro'];
                    mysqli_close($conexion);
                    $verFilas = mysqli_num_rows($ejecutarConsulta);
                    $fila = mysqli_fetch_array($ejecutarConsulta);
                    if (!$ejecutarConsulta) {
                        echo "Error en la consulta";
                    } else {
                        if ($verFilas < 1) {
                            echo "<tr><td>SIN REGISTROS</td></tr>";
                        } else {
                            for ($i = 0; $i < $fila; $i++) {
                                echo '
                                <tr>
                                    <td>' . $fila[0] . '</td>
                                    <td>' . $fila[1] . '</td>
                                    <td>' . $fila[2] . '</td>
                                    <td>' . $fila[3] . '</td>                                  
 
                            ';

                ?>
                                <td><button class="btn btn-success"><a class="botonesProductos" href="editarMarca.php?id=<?php echo $fila[0] ?>">
                                            <i class="fas fa-marker">Editar</i>
                                        </a></button> </td>
                                <td><button class="botonEditar btn btn-danger"><a class="botonesProductos" href=" eliminarMarca.php?id=<?php echo $fila[0] ?>">
                                            Cambiar estado a inactivo
                                        </a></button> </td>
                                </tr>
                <?php

                                $fila = mysqli_fetch_array($ejecutarConsulta);
                            }
                        }
                    }
                }
                ?>
            </tbody>
        </table>
        <br><br>
        <?php
        include("../conexion.php");

        if (!$conexion) {
            echo "Error en la conexion";
        } else {

            $consulta = mysqli_query($conexion, "SELECT COUNT(*) FROM  marcas")
                or die("Problemas en la inserción" . mysqli_error($conexion));
            $totalRegistros = mysqli_fetch_array($consulta);
            echo "Cantidad de pasajeros en Objeto JSON: " . json_encode($totalRegistros);
            //echo "<script type='text/javascript'>alert(".json_encode($totalRegistros).");</script>";

        }
        ?>


    </center>
</body>

</html>