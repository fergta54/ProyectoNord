<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activar productos</title>
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
                // $query = "SELECT * FROM marcas WHERE id_marca=$id";
                // $result = mysqli_query($conexion, $query);
                // if (mysqli_num_rows($result) == 1) {
                //     $row = mysqli_fetch_array($result);
                //     $nombre = $row['nombre_marca'];
                //     $descripcion = $row['descripcion_marca'];
                // }
                $query2 = "UPDATE productos set estado_producto = 1 WHERE id_prod=$id";
                mysqli_query($conexion, $query2);

                //     echo "<script type='text/javascript'>alert('El producto ha sido habilitado');
                // window.location = './adminProductos.php';
                // </script>";

                echo "<script type='text/javascript'>
                    Swal.fire({
                        icon: 'success',
                        title: 'Activación',
                        text: 'El producto ha sido activado',
                    })
                    window.location = './adminProductos.php';
                    </script>";
            }
            ?>
        </div>
    </div>
</body>


</html>