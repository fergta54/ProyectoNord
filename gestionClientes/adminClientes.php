<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATEGORIAS</title>
    <link rel="stylesheet" href="../recursos/css/index.css">
    <link rel="stylesheet" href="../recursos/css/bootstrap.min.css">
    <script src="../recursos/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../recursos/css/cabecera.css">
    <script src="../recursos/js/jquery-3.7.0.min.js"></script>
    <script src="../recursos/js/botonMostrar.js"></script>

</head>

<body>
    <div class="row">
        <div class="col-2">
            <?php include('../incluir/asideNavAdmin.php') ?>
        </div>
        <div class="col-10">

            <div class="container my-5 text-center">
                <h1>Administracion de Clientes</h1>
                <br><br>

                <button id="botonMostrar" class="botonMostrarOcultos" onClick="toggleButton()" value="Mostrar Desactivados">
                    <a href="#mostrarInhabil">Mostrar inhabilitadas</a></button>
                <br>
                <br>


                <table class="tablaMarcas table table-bordered">
                    <thead class="thead thead-dark">
                        <tr>
                            <th class="td1">Nro</th>
                            <th class="td2">Nombre</th>
                            <th class="td3">Apellido</th>
                            <th class="td4">Correo</th>
                            <th class="td5">Direccion</th>
                            <th class="td6">Telefono</th>
                            <th class="td7">Estado</th>
                            <th class="td8 td9" colspan="2">
                                <center>Acción</center>
                            </th>
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
                                "SELECT id_cliente  as Nro,nombre_cli as Nombre, apellido_cli as Apellido,
                                correo_cli as Correo ,direccion_cli as Direccion,telf_cli  as Telefono , estado_cli as Estado
                                FROM clientes where estado_cli =1 order by id_cliente"
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
                                    <td>' . $fila[5] . '</td>
                                    <td><center>' . ($fila[6] == 1 ? "Activo" : "Inactivo") . '</center></td>

                                ';

                        ?>
                                        <td>
                                            <center><button class="btn btn-warning"><a class="botonesProductos" href="aditarCliente.php?id=<?php echo $fila[0] ?>">
                                                    <i class="fas fa-marker">Editar</i>
                                                    </a></button> </center>
                                        </td>
                                        <td>
                                            <center><button class="botonEditar btn btn-danger"><a class="botonesProductos" href=" eliminarCliente.php?id=<?php echo $fila[0] ?>">
                                                     Inhabilitar
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
                            <td colspan="6"id="mostrarInhabil"><b>Clientes Desactivados</b></td>
                        </tr>
                        <?php
                        if (!$conexion) {
                            echo "Error en la conexion";
                        } else {
                            //session_start();
                            $ejecutarConsulta2 = mysqli_query(
                                $conexion,
                                "SELECT id_cliente  as Nro,nombre_cli as Nombre, apellido_cli as Apellido,
                                correo_cli as Correo ,telf_cli  as Telefono ,direccion_cli as Direccion, estado_cli as Estado
                                FROM clientes where estado_cli =2 order by id_cliente"
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
                                    echo '<tr class="ElementosEliminados" style="display:none;"><td colspan="7">SIN REGISTROS</td></tr>';
                                } else {
                                    for ($i = 0; $i < $verFilas2; $i++) {
                                        echo '
                                    <tr class="ElementosEliminados" style="display:none;">
                                        <td>' . ($i + 1) . '</td>
                                        <td>' . $fila2[1] . '</td>
                                        <td>' . $fila2[2] . '</td>
                                        <td>' . $fila2[3] . '</td>
                                        <td>' . $fila2[4] . '</td>
                                        <td>' . $fila2[5] . '</td>
                                        <td><center><p class="formatoEliminado">' . ($fila2[6] == 1 ? "Activo" : "Inactivo")  . '</p></center></td>                                  

                                ';

                        ?>

                                        <td colspan="2">
                                            <center><button class="botonActivar btn btn-success"><a class="botonesProductos" href="activarClientes.php?id=<?php echo $fila2[0] ?>">
                                                        Habilitar
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


            </div>
        </div>
    </div>
</body>

</html>