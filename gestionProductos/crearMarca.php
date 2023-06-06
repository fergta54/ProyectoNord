<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MARCAS</title>
    <link rel="stylesheet" href="../recursos/css/index.css">
    <link rel="stylesheet" href="../recursos/bootstrap.min.css">
    <script src="../recursos/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    include('../incluir/barraNav.php')
    ?>
    <center>
        <h1>
            MARCAS
        </h1>
        <button><a href="crearMarca.php">Crear Marca</a></button>
        <button><a>Ad</a></button>
        <h1>REGISTRO DE MARCAS</h1><br>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="jumbotron">
                        <h1 class="display-4 text-center">Registrar una marca</h1>

                        <p classs="lead text-center">Inserta todos los datos para registrar una marca</p>
                        <hr class="my-4">

                        <div class="section-center">
                            <div class="container">
                                <div class="row">
                                    <form action="./registrarMarca.php" method="post">
                                        <div class="row">
                                            <div>
                                                <label>Nombre de marca</label>
                                                <input name="nombreMarca" class="form-control" id="nombreMarca" type="text" required>
                                                <label>Descripción de la marca</label>
                                                <textarea name="descripcionMarca" class="form-control" id="descripcionMarca" required></textarea>
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