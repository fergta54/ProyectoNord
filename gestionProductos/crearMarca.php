<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MARCAS</title>
    <link rel="stylesheet" href="../recursos/css/index.css">
    <link rel="stylesheet" href="../recursos/bootstrap.min.css">
    <script src="../recursos/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="row">
        <div class="col-2">
            <?php include('../incluir/asideNavAdmin.php') ?>
        </div>
        <div class="col-10">
            <div class="container my-5 w-50">

                <h2 class="text-center">Registrar una marca</h2>

                <p classs="lead text-center">Inserta todos los datos para registrar una marca</p>
                <hr class="my-4">


                <form action="./registrarMarca.php" method="post">
                    <div class="form-group ">
                        <label for="nombreMarca">Nombre de marca</label><br>
                        <input name="nombreMarca" class="form-control-lg w-100" id="nombreMarca" type="text" required>

                        <label for="descripcionMarca">Descripción de la marca</label>
                        <textarea name="descripcionMarca" class="form-control-lg w-100" id="descripcionMarca" required></textarea>
                    </div>
                    <br>

                    <a href="./adminMarcas.php" class="btn btn-primary btn-danger btn-lg w-100">Cancelar</a> <br><br>
                    <button type="submit" class="btn btn-primary btn-success btn-lg w-100">Registrar</button>

                </form>

            </div>
        </div>
    </div>
</body>

</html>