<!DOCTYPE html>
<html lang="es">

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
    <script src="../recursos/js/botonMostrar.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="row">
        <div class="col-2">
            <?php include('../incluir/asideNavAdmin.php') ?>
        </div>
        <div class="col-10">
            <div class="container my-5 text-center">
                <h1>Edición de Productos</h1>
                <br><br>
                <button id="botonMostrar" class="botonMostrarOcultos" onClick="toggleButton()" value="Mostrar Desactivados">
                    <a href="#mostrarInhabil">Mostrar inhabilitados</a></button>
                <br>
                <br>

                <table class="tablaProductos table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th class="td1">Nro</th>
                            <th class="td2">Nombre</th>
                            <th class="td3">Descripcion</th>
                            <th class="td4">Imagen</th>
                            <th class="td5">Categoria</th>
                            <th class="td5">Marca</th>
                            <th class="td5">Precio compra</th>
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
                                "SELECT pr.id_prod as id,nombre_prod,pr.imagen_prod,pr.precio_unit_compra,marcas.nombre_marca,                        
                        pr.descripcion_prod,cat.nombre_categoria,pr.estado_producto,pr.id_marca,pr.id_categoria                         
                        FROM productos pr inner join categorias cat on pr.id_categoria=cat.id_categoria
                            inner join marcas on pr.id_marca=marcas.id_marca
                         where estado_producto=1 order by nombre_prod"
                            )
                                or die("Problemas en la inserción" . mysqli_error($conexion));

                            $verFilas = mysqli_num_rows($ejecutarConsulta);
                            $fila = mysqli_fetch_array($ejecutarConsulta);
                            if (!$ejecutarConsulta) {
                                echo "Error en la consulta";
                            } else {

                                if ($verFilas < 1) {
                                    echo "<tr><td colspan='10'>SIN REGISTROS</td></tr>";
                                } else {
                                    for ($i = 0; $i < $verFilas; $i++) {
                                        echo '
                                <tr>
                                    <td>' . ($i + 1) . '</td>
                                    <td>' . $fila[1] . '</td>
                                    <td>' . $fila[5] . '</td>
                                    <td>' ?><img id="logo3<?php echo $i ?>" width="50">
                                        <script>
                                            var data = <?php echo json_encode($fila[2]); ?>;

                                            function dataURItoBlob(dataURI) {

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

                                            logo3<?php echo $i ?>.src = objectURL;
                                        </script>
                                        <?php echo
                                        '<td>' . $fila[6] . '</td>
                                <td>' . $fila[4] . '</td>
                                <td>' . $fila[3] . '</td>
                                <td>
                                    <center>' . ($fila[7] == 1 ? "Activo" : "Inactivo") . '</center>
                                </td>

                                ';

                                        ?>
                                        <td>
                                            <center><button class="btn btn-warning"><a class="botonesProductos" href="editarProducto.php?id=<?php echo $fila[0] ?>">
                                                        Editar
                                                    </a></button> </center>
                                        </td>
                                        <td>
                                            <center><button class="botonEditar btn btn-danger" onClick="eliminarUno(<?= $fila[0] ?>)"><a class="botonesProductos">
                                                        Inhabilitar
                                                    </a></button> </center>
                                        </td>
                                        </tr>
                                        <script>
                                            function eliminarUno(id) {
                                                Swal.fire({
                                                    title: "¿Seguro?",
                                                    text: "¿Está seguro de desactivar el producto?",
                                                    icon: "warning",
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#DD6B55',
                                                    confirmButtonText: 'Sí,desactivarlo',
                                                    cancelButtonText: "No, no desactivar"
                                                }).then(result => {
                                                    event.preventDefault();
                                                    console.log(result.value);
                                                    if (result.value) {
                                                        Swal.fire({
                                                            icon: 'warning',
                                                            title: 'Desactivación',
                                                            text: 'El producto ha sido desactivado',
                                                        })
                                                        window.location = 'eliminarProducto.php?id=' + id;
                                                    } else {
                                                        Swal.fire({
                                                            icon: 'warning',
                                                            title: 'Activa',
                                                            text: 'El producto sigue activo',
                                                        })

                                                    }
                                                });
                                            }
                                        </script>
                        <?php

                                        $fila = mysqli_fetch_array($ejecutarConsulta);
                                    }
                                }
                            }
                        }

                        // ahora para los elementos ocultos

                        ?>
                        <tr id="tituloEliminado" style="display:none;">
                            <td colspan="10" id="mostrarInhabil"><b>Productos inhabilitados</b></td>
                        </tr>
                        <?php
                        if (!$conexion) {
                            echo "Error en la conexion";
                        } else {
                            //session_start();
                            $ejecutarConsulta2 = mysqli_query(
                                $conexion,
                                "SELECT pr.id_prod as id,nombre_prod,pr.imagen_prod,pr.precio_unit_compra,marcas.nombre_marca,                        
                        pr.descripcion_prod,cat.nombre_categoria,pr.estado_producto,pr.id_marca,pr.id_categoria                         
                        FROM productos pr inner join categorias cat on pr.id_categoria=cat.id_categoria
                            inner join marcas on pr.id_marca=marcas.id_marca
                         where estado_producto=2 order by nombre_prod"
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
                                    echo '<tr class="ElementosEliminados" style="display:none;"><td colspan="10">SIN REGISTROS</td></tr>';
                                } else {
                                    for ($i = 0; $i < $verFilas2; $i++) {
                                        echo '
                                    <tr class="ElementosEliminados" style="display:none;">
                                    <td>' . ($i + 1) . '</td>
                                    <td>' . $fila2[1] . '</td>
                                    <td>' . $fila2[5] . '</td>
                                        <td>' ?><img id="logo20<?php echo $i ?>" width="50">
                                        <script>
                                            var data = <?php echo json_encode($fila2[2]); ?>;

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
                                        '<td>' . $fila2[6] . '</td>
                                <td>' . $fila2[4] . '</td>
                                <td>' . $fila2[3] . '</td>
                                <td>
                                    <center><p class="formatoEliminado">' . ($fila2[7] == 1 ? "Activo" : "Inactivo") . '</p></center>
                                </td>                                  
     
                                ';
                                        ?>
                                        <td colspan="2">
                                            <center><button class="botonActivar btn btn-success"><a class="botonesProductos" href="activarProducto.php?id=<?php echo $fila2[0] ?>">
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