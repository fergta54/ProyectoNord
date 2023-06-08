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
    <script src="../recursos/js/jquery-3.7.0.min.js"></script>
</head>

<body>
    <div class="row">
        <div class="col-2">
            <?php include('../incluir/asideNavAdmin.php') ?>
        </div>
        <div class="col-10">
            <?php
            include('../conexion.php');
            ?>
            <center>
                <h1>
                    PRODUCTOS
                </h1>
                <button><a href="crearMarca.php">Crear Producto</a></button>
                <button><a>Ad</a></button>
                <h1>REGISTRO DE PRODUCTO</h1><br>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="jumbotron">
                                <h1 class="display-4 text-center">Registrar un producto</h1>

                                <p classs="lead text-center">Inserta todos los datos para registrar un producto</p>
                                <hr class="my-4">

                                <div class="section-center">
                                    <div class="container">
                                        <div class="row">
                                            <form action="./registrarProducto.php" method="post">
                                                <div class="row">
                                                    <div>
                                                        <label>Nombre del Producto</label>
                                                        <input name="nombreProducto" class="form-control" id="nombreProducto" type="text" required>
                                                        <label>Descripción del Producto</label>
                                                        <textarea name="descripcionProducto" class="form-control" id="descripcionProducto" required></textarea>
                                                        <br>
                                                        <label>Imagen del Producto</label>
                                                        <input type="file" accept="image/*" class="localProd" id="localProd">
                                                        <input name="lgPr" id="lgPr" type="hidden">
                                                        <script>
                                                            const $file = document.querySelector(".localProd");
                                                            let url = "../recursos/img/sinfoto.jpg"
                                                            // ESTA FUNCION PERMITE CARGAR UNA FOTO POR DEFECTO 
                                                            const toDataURL = url => fetch(url)
                                                                .then(response => response.blob())
                                                                .then(blob => new Promise((resolve, reject) => {
                                                                    const reader = new FileReader()
                                                                    //reader.onloadend = () => resolve(reader.result)
                                                                    reader.onloadend = () => {
                                                                        const inpLogo = document.getElementById("lgPr");
                                                                        inpLogo.value = reader.result;
                                                                    }

                                                                    reader.onerror = reject
                                                                    reader.readAsDataURL(blob)
                                                                }))
                                                            toDataURL(url);

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
                                                                        console.log('base64: ', srcData);
                                                                        inpLogo = document.getElementById("lgPr");
                                                                        inpLogo.value = srcData;

                                                                        // $.post('gestionProductos/registrarCategoria.php', {
                                                                        //     variableLogo: srcData
                                                                        // });
                                                                        console.log('exito enviando');
                                                                    };
                                                                }
                                                            })
                                                        </script>
                                                        <br>
                                                        <label>Precio del Producto</label>
                                                        <input name="precioProducto" class="form-control" id="precioProducto" type="number" step="any" required>
                                                        <br>
                                                        <label for="catProd">Seleccione la categoría</label>&emsp;&emsp;&emsp;&emsp;
                                                        <select style="width:600px;" class="form-control" name="catProd" required>
                                                            <?php
                                                            $query1 = mysqli_query($conexion, "SELECT id_categoria,nombre_categoria FROM categorias 
                                                    where estado_categoria=1");

                                                            $verFilas1 = mysqli_num_rows($query1);
                                                            $valores1 = mysqli_fetch_array($query1);

                                                            if (!$query1) {
                                                                echo "Error en la consulta";
                                                            } else {
                                                                for ($i = 0; $i < $verFilas1; $i++) {
                                                                    echo '<option value="' . $valores1[0] . '">' . ($i + 1) . " - " . ($valores1[1]) . '</option>';
                                                                    $valores1 = mysqli_fetch_array($query1);
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                        <br>
                                                        <label for="marcaProd">Seleccione la marca</label>&emsp;&emsp;&emsp;&emsp;
                                                        <select style="width:600px;" class="form-control" name="marcaProd" required>
                                                            <?php
                                                            $query2 = mysqli_query($conexion, "SELECT id_marca,nombre_marca FROM marcas 
                                                    where estado_marca=1");

                                                            $verFilas2 = mysqli_num_rows($query2);
                                                            $valores2 = mysqli_fetch_array($query2);

                                                            if (!$query2) {
                                                                echo "Error en la consulta";
                                                            } else {
                                                                for ($i = 0; $i < $verFilas2; $i++) {
                                                                    echo '<option value="' . $valores2[0] . '">' . ($i + 1) . " - " . ($valores2[1]) . '</option>';
                                                                    $valores2 = mysqli_fetch_array($query2);
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-btn">
                                                            <button class="submit-btn">Registrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
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
        </div>
    </div>

</body>

</html>