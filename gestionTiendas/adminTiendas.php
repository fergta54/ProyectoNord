<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIENDAS</title>
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
                <h1>Administración de Tiendas</h1>
                <br><br>
                <button id="botonMostrar" class="botonMostrarOcultos" onClick="toggleButton()" value="Mostrar Desactivados">
                    <a href="#mostrarInhabil">Mostrar inhabilitadas</a></button>
                <br>
                <br>

                <table class="tablaCategorias table table-bordered">
                    <thead class="thead thead-dark fijadorCabecera">
                        <tr>
                            <th class="td1">Nro</th>
                            <th class="td2">Nombre</th>
                            <th class="td3">Dirección</th>
                            <th class="td4">Latitud</th>
                            <th class="td4">Longitud</th>
                            <th class="td4">Foto</th>
                            <th class="td5">Estado</th>
                            <th class="td6 td7" colspan="2">
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
                                "SELECT id_tienda,nombre_tienda,direccion_tienda,latitud_tienda,longitud_tienda,
                        foto_tienda,estado_tienda 
                        FROM tiendas where estado_tienda=1 order by nombre_tienda"
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
                                    <td>' ?><img id="logo<?php echo $i ?>" width="50">
                                        <script>
                                            var data = <?php echo json_encode($fila[5]); ?>;

                                            function dataURItoBlob(dataURI) {
                                                // convert base64/URLEncoded data component to raw binary data held in a string
                                                var byteString;

                                                if (dataURI.split(',')[0].indexOf('base64') >= 0)
                                                    byteString = atob(dataURI.split(',')[1]);
                                                else
                                                    byteString = unescape(dataURI.split(',')[1]);

                                                // separate out the mime component
                                                var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

                                                // write the bytes of the string to a typed array
                                                var ia = new Uint8Array(byteString.length);
                                                for (var i = 0; i < byteString.length; i++) {
                                                    ia[i] = byteString.charCodeAt(i);
                                                }

                                                return new Blob([ia], {
                                                    type: mimeString
                                                });
                                            }
                                            var dataURI = data;

                                            var blob = dataURItoBlob(dataURI);
                                            var objectURL = URL.createObjectURL(blob);

                                            logo<?php echo $i ?>.src = objectURL;
                                        </script>
                                        <?php echo
                                        '</td>
                                <td>
                                    <center>' . ($fila[6] == 1 ? "Activo" : "Inactivo") . '</center>
                                </td>

                                ';

                                        ?>
                                        <td>
                                            <center><button class="btn btn-warning"><a class="botonesProductos" href="editarTienda.php?id=<?php echo $fila[0] ?>">
                                                        Editar
                                                    </a></button> </center>
                                        </td>
                                        <td>
                                            <center><button class="botonEditar btn btn-danger"><a class="botonesProductos" href=" eliminarTienda.php?id=<?php echo $fila[0] ?>">
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
                            <td colspan="9" id="mostrarInhabil"><b>Categorias inhabilitadas</b></td>
                        </tr>
                        <?php
                        if (!$conexion) {
                            echo "Error en la conexion";
                        } else {
                            //session_start();
                            $ejecutarConsulta2 = mysqli_query(
                                $conexion,
                                "SELECT id_tienda,nombre_tienda,direccion_tienda,latitud_tienda,longitud_tienda,
                        foto_tienda,estado_tienda 
                        FROM tiendas where estado_tienda=2 order by nombre_tienda"
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
                                    echo '<tr class="ElementosEliminados" style="display:none;"><td colspan="9">SIN REGISTROS</td></tr>';
                                } else {
                                    for ($i = 0; $i < $verFilas2; $i++) {
                                        echo '
                                    <tr class="ElementosEliminados" style="display:none;">
                                        <td>' . ($i + 1) . '</td>
                                        <td>' . $fila2[1] . '</td>
                                        <td>' . $fila2[2] . '</td>
                                        <td>' . $fila2[3] . '</td>
                                        <td>' . $fila2[4] . '</td>
                                        <td>' ?><img id="logo20<?php echo $i ?>" width="50">
                                        <script>
                                            var data = <?php echo json_encode($fila2[5]); ?>;

                                            function dataURItoBlob(dataURI) {
                                                // convert base64/URLEncoded data component to raw binary data held in a string
                                                var byteString;

                                                if (dataURI.split(',')[0].indexOf('base64') >= 0)
                                                    byteString = atob(dataURI.split(',')[1]);
                                                else
                                                    byteString = unescape(dataURI.split(',')[1]);

                                                // separate out the mime component
                                                var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

                                                // write the bytes of the string to a typed array
                                                var ia = new Uint8Array(byteString.length);
                                                for (var i = 0; i < byteString.length; i++) {
                                                    ia[i] = byteString.charCodeAt(i);
                                                }

                                                return new Blob([ia], {
                                                    type: mimeString
                                                });
                                            }
                                            var dataURI = data;

                                            var blob = dataURItoBlob(dataURI);
                                            var objectURL = URL.createObjectURL(blob);

                                            logo20<?php echo $i ?>.src = objectURL;
                                        </script>
                                        <?php echo
                                        '</td>
                                <td>
                                    <center><p class="formatoEliminado">' . ($fila2[6] == 1 ? "Activo" : "Inactivo") . '</p></center>
                                </td>                                  
     
                                ';

                                        ?>

                                        <td colspan="2">
                                            <center><button class="botonActivar btn btn-success"><a class="botonesProductos" href="activarTienda.php?id=<?php echo $fila2[0] ?>">
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