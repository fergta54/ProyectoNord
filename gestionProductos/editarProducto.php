<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATEGORIAS</title>
    <link rel="stylesheet" href="../recursos/css/index.css">
    <link rel="stylesheet" href="../recursos/css/cabecera.css">
    <link rel="stylesheet" href="../recursos/css/bootstrap.min.css">
    <script src="../recursos/js/bootstrap.min.js"></script>
    <script src="../recursos/js/jquery-3.7.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="row">
        <div class="col-2">
            <?php include('../incluir/asideNavAdmin.php') ?>
        </div>
        <div class="col-10">
            <?php
            include('../conexion.php');
            $nombre = '';
            $descripcion = '';
            $dataLogo = '';

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $query = "SELECT nombre_prod,imagen_prod,precio_unit_compra,descripcion_prod,
        productos.id_marca,marcas.nombre_marca,productos.id_categoria,categorias.nombre_categoria
         FROM productos inner join marcas on productos.id_marca=marcas.id_marca
        inner join categorias on productos.id_categoria=categorias.id_categoria WHERE id_prod=$id";
                $result = mysqli_query($conexion, $query);
                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_array($result);
                    $nombre = $row['nombre_prod'];
                    $dataImagen = $row['imagen_prod'];
                    $precio = $row['precio_unit_compra'];
                    $id_marca = $row[4];
                    $descripcion = $row['descripcion_prod'];
                    $id_categoria = $row[6];
                }
            }

            if (isset($_POST['actualizar'])) {
                $id = $_GET['id'];
                $nombre = $_POST['nombre'];
                $dataImagen = $_POST['lgPrd22'];
                $precio = $_POST['precioProducto'];
                $id_marca = $_POST['marcaProd'];
                $descripcion = $_POST['descripcion'];
                $id_categoria = $_POST['catProd'];


                $query = "UPDATE productos set nombre_prod = '$nombre',imagen_prod='$dataImagen',precio_unit_compra='$precio',
        id_marca='$id_marca', descripcion_prod = '$descripcion',id_categoria='$id_categoria'
        WHERE id_prod=$id";
                mysqli_query($conexion, $query);

                // echo "<script type='text/javascript'>alert('Los cambios en el producto han sido guardados');
                // window.location = './adminProductos.php';
                // </script>";
                echo "<script type='text/javascript'>
                Swal.fire({
                    icon: 'success',
                    title: 'Modificacion',
                    text: 'Los cambios en el producto han sido guardados',
                })
                window.location = './adminProductos.php';
                </script>";
            }

            ?>

            <div class="container my-5 w-50">
                <h2 class="text-center">Editar Producto</h2>

                <form action="editarProducto.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <label for="nombre">Nombre del producto</label><br>
                        <input name="nombre" type="text" class="form-control-lg w-100" value="<?php echo $nombre; ?>">
                        <br><br>
                        <center>
                            <div id="mostrarImgProd">
                                <img id="imgEditarProd" width="150">
                            </div>
                        </center>
                        <br><br>
                        <script>
                            // CLAVEEE PERMITE IMPRIMIR EN CONSOLA VARIABLES DE PHP
                            console.log(<?= json_encode($id_marca); ?>);
                            console.log(<?= json_encode($id_categoria); ?>);

                            var data = <?php echo json_encode($dataImagen); ?>;

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

                            imgEditarProd.src = objectURL;
                        </script>
                        <label for="logoProd">Imagen del producto</label><br>
                        <input type="file" accept="image/*" class="localPrd22" id="logoprd" name="logoProd">
                        <input name="lgPrd22" id="lgPrd22" type="hidden" value="<?php echo $dataImagen; ?>">
                        &emsp13;&emsp13;&emsp13;&emsp13;&emsp13;
                        <input type="button" onclick="ponerImagenDefecto()" value="Eliminar imagen">
                        <br><br>
                        <script>
                            function ponerImagenDefecto() {
                                let url = "../recursos/img/sinfoto.jpg"
                                // ESTA FUNCION PERMITE CARGAR UNA FOTO POR DEFECTO 
                                const toDataURL = url => fetch(url)
                                    .then(response => response.blob())
                                    .then(blob => new Promise((resolve, reject) => {
                                        const reader = new FileReader()
                                        //reader.onloadend = () => resolve(reader.result)
                                        reader.onloadend = () => {
                                            const inpLogo = document.getElementById("lgPrd22");
                                            inpLogo.value = reader.result;
                                            console.log('base64: ', reader.result);

                                            // para mostrar la imagen en el img
                                            // var data = json_encode(reader.result)
                                            // var data = JSON.stringify(reader.result)
                                            // var dataURI = data;

                                            // var blob = dataURItoBlob(dataURI);
                                            // var objectURL = URL.createObjectURL(blob);

                                            //imgEditarCat.src = objectURL;
                                            var x = document.getElementById("mostrarImgProd")
                                            x.style.display = "none";
                                        }
                                        // reader.onerror = reject
                                        reader.readAsDataURL(blob)
                                    }))
                                toDataURL(url);

                            }

                            const $file = document.querySelector(".localPrd22");


                            // ESTA FUNCION PERMITE DETECTAR CARGADO DE IMAGEN EN INPUT
                            // Y CARGARLA
                            $file.addEventListener("change", (event) => {
                                const selectedfile = event.target.files;
                                if (selectedfile.length > 0) {
                                    const [imageFile] = selectedfile;
                                    const fileReader = new FileReader();

                                    fileReader.readAsDataURL(imageFile);

                                    fileReader.onload = () => {
                                        const srcData = fileReader.result;
                                        //console.log('base64: ', srcData);
                                        inpLogo = document.getElementById("lgPrd22");
                                        inpLogo.value = srcData;
                                        // // prueba para mostrar imagen en tiempo real

                                        // <?php $varLogo = "<script>srcData</script>" ?>

                                        // var data = <?php echo json_encode($varLogo); ?>;
                                        // console.log(data);
                                        // // para mostrar la imagen en el img
                                        // // var data = json_encode(srcData)
                                        // // var data = JSON.stringify(srcData)
                                        // var dataURI = data;

                                        // var blob = dataURItoBlob(dataURI);
                                        // var objectURL = URL.createObjectURL(blob);

                                        // imgEditarCat.src = objectURL;

                                        // console.log('exito enviando');
                                        var x = document.getElementById("mostrarImgProd")
                                        x.style.display = "none";
                                    };
                                }
                            })
                        </script>

                        <label for="precioProducto">Precio de compra</label><br>
                        <input name="precioProducto" class="form-control-lg w-100" id="precioProducto" type="number" step="any" required value="<?php echo $precio; ?>">
                        <br>
                        <label for="catProd">Seleccione la categoría</label>&emsp;&emsp;&emsp;&emsp;
                        <select style="width:600px;" class="form-control" name="catProd" required>
                            <?php
                            $query1 = mysqli_query($conexion, "SELECT id_categoria,nombre_categoria FROM categorias");

                            $verFilas1 = mysqli_num_rows($query1);
                            $valores1 = mysqli_fetch_array($query1);

                            if (!$query1) {
                                echo "Error en la consulta";
                            } else {
                                for ($i = 0; $i < $verFilas1; $i++) {
                                    if ($valores1[0] == $id_categoria) {
                                        echo '<option value="' . $valores1[0] . '" selected>' . ($i + 1) . " - " . ($valores1[1]) . '</option>';
                                    } else {
                                        echo '<option value="' . $valores1[0] . '">' . ($i + 1) . " - " . ($valores1[1]) . '</option>';
                                    }
                                    $valores1 = mysqli_fetch_array($query1);
                                }
                            }
                            ?>
                        </select>
                        <br>
                        <label for="marcaProd">Seleccione la marca</label>&emsp;&emsp;&emsp;&emsp;
                        <select style="width:600px;" class="form-control" name="marcaProd" required>
                            <?php
                            $query2 = mysqli_query($conexion, "SELECT id_marca,nombre_marca FROM marcas");

                            $verFilas2 = mysqli_num_rows($query2);
                            $valores2 = mysqli_fetch_array($query2);

                            if (!$query2) {
                                echo "Error en la consulta";
                            } else {
                                for ($i = 0; $i < $verFilas2; $i++) {
                                    if ($valores2[0] == $id_marca) {
                                        echo '<option value="' . $valores2[0] . '" selected>' . ($i + 1) . " - " . ($valores2[1]) . '</option>';
                                    } else {
                                        echo '<option value="' . $valores2[0] . '">' . ($i + 1) . " - " . ($valores2[1]) . '</option>';
                                    }
                                    $valores2 = mysqli_fetch_array($query2);
                                }
                            }
                            ?>
                        </select>
                        <br>

                        <label for="descripcion">Descripción</label><br>
                        <textarea name="descripcion" class="form-control-lg w-100" cols="100" rows="30"><?php echo $descripcion; ?></textarea>
                    </div>

                    <a href="./adminProductos.php" class="btn btn-primary btn-danger btn-lg w-100">Cancelar</a> <br><br>
                    <button type="submit" class="btn btn-primary btn-success btn-lg w-100" name="actualizar">Actualizar datos</button>
                </form>
            </div>
        </div>
    </div>

    <?php //include('includes/footer.php'); 
    ?>

</body>

</html>