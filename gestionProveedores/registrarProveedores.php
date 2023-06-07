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
        <h1>REGISTRO DE PROVEEDORES</h1><br>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="jumbotron">
                        <p classs="lead text-center">Inserta todos los datos para registrar un Proveedor</p>
                        <hr class="my-4">
                        <div class="section-center">
                            <div class="container">
                                <div class="row">
                                    <form action="./crearProveedor.php" method="post">
                                        <div class="row">
                                            <div>
                                                <label>Razon Social</label>
                                                <textarea name="razonsocialProveedor" class="form-control" id="razonsocialProveedor" required></textarea>
                                                <label>Correo</label>
                                                <input name="correoProveedor" class="form-control" id="correoProveedor" type="email" required>
                                                <label>Telefono</label>
                                                <input name="telefonoProveedor" class="form-control" id="telefonoProveedor" type="text" required>
                                                <label>Direccion</label>
                                                <input name="direccionProveedor" class="form-control" id="direccionProveedor" type="text" required>
                                                <br>       
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-btn">
                                                    <button class="submit-btn">Registrar Proveedores</button>
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