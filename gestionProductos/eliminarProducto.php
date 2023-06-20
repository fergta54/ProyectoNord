<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <!-- <form action="eliminarProducto.php?id=<?php echo $_GET['id']; ?>" method="POST">
                <button type="submit" id="botonOcultoEliminar" name="botonOcultoEliminar" hidden></button>
            </form> -->

            <?php
            if (isset($_GET['id'])) {
                include('../conexion.php');
                $id = $_GET['id'];
                $query2 = "UPDATE productos set estado_producto = 2 WHERE id_prod=$id";
                mysqli_query($conexion, $query2);

                //             echo "<script type='text/javascript'>alert('El producto ha sido inhabilitado');
                // window.location = './adminProductos.php';
                // </script>";
                echo "<script type='text/javascript'>                
                window.location = './adminProductos.php';
                </script>";
            }
            ?>

            <!-- <script>
                if (verificarEliminacion()) {
                    document.getElementById("botonOcultoEliminar").click();
                } else {
                    alert("El producto sigue activo");
                    window.location = './adminProductos.php'
                }

                function verificarEliminacion() {
                    let texto = "¿Está seguro de inhabilitar el producto?";
                    if (confirm(texto) == true) {
                        return true;
                    } else {
                        return false;
                    }
                }
            </script> -->
        </div>
    </div>
</body>

</html>