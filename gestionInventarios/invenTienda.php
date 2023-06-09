<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INVENTARIO</title>
    <link rel="stylesheet" href="../recursos/css/index.css">
    <link rel="stylesheet" href="../recursos/css/bootstrap.min.css">
    <script src="../recursos/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../recursos/css/cabecera.css">
    <script src="../recursos/js/jquery-3.7.0.min.js"></script>
    <script src="../recursos/js/botonMostrar.js"></script>
</head>

<body>
    <?php
    include('../conexion.php');
    $nombre = '';
    $descripcion = '';
    $dataLogo = '';

    if (isset($_POST['actualizar'])) {
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $dataLogo = $_POST['lgCat22'];

        $query = "UPDATE categorias set nombre_categoria = '$nombre', descripcion_categoria = '$descripcion',
        logo_categoria='$dataLogo' WHERE id_categoria=$id";
        mysqli_query($conexion, $query);

        echo "<script type='text/javascript'>alert('Los cambios en la categoria han sido guardados');
        window.location = './adminCategorias.php';
        </script>";
    }

    ?>

    <div class="row">
        <div class="col-2">
            <?php include('../incluir/asideNavAdmin.php')
            ?>
        </div>
        <div class="col-10">
            <?php
            include('../conexion.php');
            if (!$conexion) {
                echo "Error en la conexion";
            } else {
                //session_start();
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];

                    $query = mysqli_query(
                        $conexion,
                        "SELECT id_tienda,nombre_tienda
                            FROM tiendas 
                            WHERE id_tienda=$id"
                    )
                        or die("Problemas en la inserción" . mysqli_error($conexion));

                    $tienda = mysqli_fetch_array($query);
                }
            }
            ?>


            <div class="container my-5 text-center">
                <h1>Inventario</h1>
                <h2 id="tituloInvTienda"><?php echo $tienda[1] ?></h2>
                <br><br>
                <button id="agregarProdInv" class="botonMostrarOcultos">
                    <a href="agregarProductoInv.php?id=<?php echo $fila[5] ?>">Agregar Producto</a></button>
                <br>
                <br>

                <table class="tablaInvProductos table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th class="td1">Nro</th>
                            <th class="td2">Nombre</th>
                            <th class="td3">Descripcion</th>
                            <th class="td4">Imagen</th>
                            <th class="td5">Stock</th>
                            <th class="td6">
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
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];

                                $ejecutarConsulta = mysqli_query(
                                    $conexion,
                                    "SELECT productos.id_prod,nombre_prod, imagen_prod, descripcion_prod,
                                stock_inventario,id_inventario,inventarios.id_tienda,tiendas.nombre_tienda
                                FROM inventarios inner join tiendas on inventarios.id_tienda=tiendas.id_tienda
                                inner join productos on inventarios.id_producto=productos.id_prod 
                                WHERE inventarios.id_tienda=$id and estado_producto=1
                                order by nombre_prod"
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
                                        // LA TABLA
                                        for ($i = 0; $i < $verFilas; $i++) {
                                            echo '
                                    <tr>
                                        <td>' . ($i + 1) . '</td>
                                        <td>' . $fila[1] . '</td>
                                        <td>' . $fila[3] . '</td>
                                        <td>' ?><img id="logo3<?php echo $i ?>" width="50">
                                            <script>
                                                var data = <?php echo json_encode($fila[2]); ?>;

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

                                                logo3<?php echo $i ?>.src = objectURL;
                                            </script>
                                            <?php echo
                                            '<td>' . $fila[4] . '</td>
                                    ';

                                            ?>
                                            <td>
                                                <center><button class="btn btn-warning"><a class="botonesProductos" href="modificarStockProducto.php?id=<?php echo $fila[5] ?>">
                                                            Modificar Stock
                                                        </a></button> </center>
                                            </td>
                                            </tr>
                        <?php

                                            $fila = mysqli_fetch_array($ejecutarConsulta);
                                        }
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