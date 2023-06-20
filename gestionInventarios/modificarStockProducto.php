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

            if (isset($_GET['id_inv'])) {
                $idInv = $_GET['id_inv'];
                $query = "SELECT nombre_prod,imagen_prod,precio_unit_compra,descripcion_prod,
        nombre_marca,nombre_categoria,nombre_tienda,stock_inventario,inventarios.id_tienda
         FROM productos inner join inventarios on productos.id_prod=inventarios.id_producto
        inner join categorias on productos.id_categoria=categorias.id_categoria 
        inner join marcas on productos.id_marca=marcas.id_marca
        inner join tiendas on tiendas.id_tienda=inventarios.id_tienda
        WHERE id_inventario=$idInv";
                $result = mysqli_query($conexion, $query);
                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_array($result);
                    $producto = $row['nombre_prod'];
                    $dataImagen = $row['imagen_prod'];
                    $precio = $row['precio_unit_compra'];
                    $descripcion = $row['descripcion_prod'];
                    $categoria = $row['nombre_categoria'];
                    $marca = $row['nombre_marca'];
                    $tienda = $row['nombre_tienda'];
                    $stock = $row['stock_inventario'];
                    $id_tienda = $row[8];
                }
            }

            if (isset($_POST['actualizar'])) {
                $idInv = $_GET['id_inv'];
                $stockInv = $_POST['stockInv'];

                $query = "UPDATE inventarios set stock_inventario = '$stockInv'
        WHERE id_inventario=$idInv";
                mysqli_query($conexion, $query);

                //         echo "<script type='text/javascript'>alert('El stock ha sido guardado con éxito');
                // window.location = './invenTienda.php?id=" . $id_tienda . "'
                // </script>";

                echo "<script type='text/javascript'>
                Swal.fire({
                    icon: 'success',
                    title: 'Modificacion del stock del producto',
                    text: 'El stock ha sido guardado con éxito',
                })
                window.location = './invenTienda.php?id=" . $id_tienda . "'
                </script>";
            }

            ?>
            <div class="row">
                <div class="col-2">
                    <?php include('../incluir/asideNavAdmin.php') ?>
                </div>
                <div class="col-10">
                    <div class="container my-5 w-50">
                        <h2 class="text-center">Modificar Stock del Producto</h2>
                        <h3>Tienda <?php echo $tienda ?></h3>

                        <form action="modificarStockProducto.php?id_inv=<?php echo $_GET['id_inv']; ?>" method="POST">
                            <div class="form-group">
                                <!-- <label for="tienda">Nombre de la tienda</label><br>
                        <input name="tienda" type="text" class="form-control-lg w-100" value="<?php echo $tienda; ?>" readonly>
                        <br><br> -->
                                <label for="nombre">Nombre del producto</label><br>
                                <input name="nombre" type="text" class="form-control-lg w-100" value="<?php echo $producto; ?>" readonly>
                                <br><br>
                                <center>
                                    <label for="imgProd">Imagen del producto</label><br>
                                    <img id="imgProd" width="150">
                                </center>
                                <br><br>
                                <script>
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

                                    imgProd.src = objectURL;
                                </script>

                                <label for="descripcion">Descripción</label><br>
                                <input name="descripcion" type="text" class="form-control-lg w-100" cols="100" rows="30" value="<?php echo $descripcion; ?>" readonly>
                                <br>
                                <label for="precioProducto">Precio de compra</label><br>
                                <input name="precioProducto" class="form-control-lg w-100" id="precioProducto" type="number" step="any" required value="<?php echo $precio; ?>" readonly>
                                <br>
                                <label for="categoriaProducto">Categoría</label><br>
                                <input name="categoriaProducto" class="form-control-lg w-100" id="categoriaProducto" type="text" step="any" required value="<?php echo $categoria; ?>" readonly>
                                <br>
                                <label for="marcaProducto">Marca</label><br>
                                <input name="marcaProducto" class="form-control-lg w-100" id="marcaProducto" type="text" step="any" required value="<?php echo $marca; ?>" readonly>
                                <br>
                                <label for="stockInv">Ingrese el stock disponible en la tienda</label><br>
                                <input name="stockInv" class="form-control-lg w-100" id="stockInv" type="number" step="any" required value="<?php echo $stock; ?>">
                                <br>
                            </div>

                            <a href="./adminProductos.php" class="btn btn-primary btn-danger btn-lg w-100">Cancelar</a> <br><br>
                            <button type="submit" class="btn btn-primary btn-success btn-lg w-100" name="actualizar">Guardar stock de la tienda</button>
                        </form>
                    </div>
                </div>
            </div>

            <?php //include('includes/footer.php'); 
            ?>
        </div>
    </div>

</body>

</html>