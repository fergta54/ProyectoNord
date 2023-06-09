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
</head>

<body>
    <div class="row">
        <div class="col-2">
            <?php include('../incluir/asideNavAdmin.php') ?>
        </div>
        <div class="col-10">
            <div class="container my-5 text-center">
                <h1>Lista de Productos</h1>
                <br><br>


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
                                        '<td>' . $fila[6] . '</td>
                                <td>' . $fila[4] . '</td>
                                <td>' . $fila[3] . '</td></tr>';


                                        $fila = mysqli_fetch_array($ejecutarConsulta);
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