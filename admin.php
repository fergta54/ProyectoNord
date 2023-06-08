<?php
// seguridad de sesiones paginacion
include('./verificarSesionAdmin.php')
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="./recursos/css/index.css">
    <link rel="stylesheet" href="./recursos/css/bootstrap.min.css">

    <script src="./recursos/js/jquery-3.7.0.min.js"></script>
    <script src="./recursos/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./recursos/css/cabecera.css">
    <style>
        a {
            color: white;
        }

        a:hover {
            color: orange;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-2">
            <?php include('asideAdmin.php') ?>
        </div>
        <div class="col-10">


        </div>
    </div>
</body>

</html>