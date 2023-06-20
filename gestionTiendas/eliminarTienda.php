<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../recursos/js/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="row">
        <div class="col-2">
            <?php include('../incluir/asideNavAdmin.php') ?>
        </div>
        <div class="col-10">
            <form action="eliminarTienda.php?id=<?php echo $_GET['id']; ?>" method="POST">
                <button type="submit" id="botonOcultoEliminar" name="botonOcultoEliminar" hidden></button>
            </form>
            <?php
            if (isset($_GET['id']) && isset($_POST['botonOcultoEliminar'])) {
                include('../conexion.php');
                $id = $_GET['id'];
                $query2 = "UPDATE tiendas set estado_tienda = 2 WHERE id_tienda=$id";
                mysqli_query($conexion, $query2);

                //             echo "<script type='text/javascript'>alert('La tienda ha sido desactivada');
                // window.location = './adminTiendas.php';
                // </script>";
                echo "<script type='text/javascript'>
                    Swal.fire({
                        icon: 'warning',
                        title: 'Desctivación',
                        text: 'La tienda ha sido desactivada',
                    })
                    window.location = './adminTiendas.php';
                    </script>";
            }
            ?>
            <script>
                if (verificarEliminacion()) {
                    document.getElementById("botonOcultoEliminar").click();
                } else {
                    alert("La tienda sigue activa");
                    window.location = './adminTiendas.php'
                }

                function verificarEliminacion() {
                    let texto = "¿Está seguro de desactivar la tienda?";
                    if (confirm(texto) == true) {
                        return true;
                    } else {
                        return false;
                    }
                }
            </script>

        </div>
    </div>
</body>

</html>