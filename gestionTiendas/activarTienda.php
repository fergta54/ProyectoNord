<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activar tiendas</title>
    <link rel="stylesheet" href="../recursos/css/index.css">
    <link rel="stylesheet" href="../recursos/css/bootstrap.min.css">
    <script src="../recursos/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../recursos/css/cabecera.css">
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

            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                $query2 = "UPDATE tiendas set estado_tienda = 1 WHERE id_tienda=$id";
                mysqli_query($conexion, $query2);
                //             echo "<script type='text/javascript'>alert('La tienda ha sido activada');
                // window.location = './adminTiendas.php';
                // </script>";


                echo "<script type='text/javascript'>
    Swal.fire({
        icon: 'success',
        title: 'Activación',
        text: 'La tienda ha sido activada',
    })
    window.location = './adminTiendas.php';
    </script>";
            }
            ?>

        </div>
    </div>
</body>


</html>