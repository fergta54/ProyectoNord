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
    <script src="../recursos/js/jquery-3.7.0.min.js"></script>
</head>

<body>
    <?php
    include('../incluir/barraNav.php')
    ?>
    <center>
        <h1>
            CATEGORIAS
        </h1>
        <button><a href="crearMarca.php">Crear Categoria</a></button>
        <button><a>Ad</a></button>
        <h1>REGISTRO DE CATEGORIAS</h1><br>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="jumbotron">
                        <h1 class="display-4 text-center">Registrar una categoria</h1>

                        <p classs="lead text-center">Inserta todos los datos para registrar una categoria</p>
                        <hr class="my-4">

                        <div class="section-center">
                            <div class="container">
                                <div class="row">
                                    <form action="./registrarCategoria.php" method="post">
                                        <div class="row">
                                            <div>
                                                <label>Nombre de Categoria</label>
                                                <input name="nombreCategoria" class="form-control" id="nombreCategoria" type="text" required>
                                                <label>Descripción de la Categoria</label>
                                                <textarea name="descripcionCategoria" class="form-control" id="descripcionCategoria" required></textarea>
                                                <br>
                                                <label>Logo de la Categoria</label>
                                                <input type="file" accept="image/*" class="localCat" required>
                                                <input name="lgCat" id="lgCat" type="hidden">
                                                <script>
                                                    const $file = document.querySelector(".localCat");
                                                    $file.addEventListener("change", (event) => {
                                                        const selectedfile = event.target.files;
                                                        if (selectedfile.length > 0) {
                                                            const [imageFile] = selectedfile;
                                                            const fileReader = new FileReader();
                                                            fileReader.onload = () => {
                                                                const srcData = fileReader.result;
                                                                console.log('base64: ', srcData);
                                                                const inpLogo = document.getElementById("lgCat");
                                                                inpLogo.value = srcData;

                                                                // $.post('gestionProductos/registrarCategoria.php', {
                                                                //     variableLogo: srcData
                                                                // });
                                                                console.log('exito enviando');
                                                            };
                                                            fileReader.readAsDataURL(imageFile);
                                                            //header("location: mostrarimg.php");
                                                            // header('location: ./mostrarimg.php')          
                                                        }
                                                    })
                                                </script>
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
</body>

</html>