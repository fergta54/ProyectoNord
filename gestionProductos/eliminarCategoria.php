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
            <form action="eliminarCategoria.php?id=<?php echo $_GET['id']; ?>" method="POST">
                <button type="submit" id="botonOcultoEliminar" name="botonOcultoEliminar" hidden></button>
            </form>

            <?php
            if (isset($_GET['id']) && isset($_POST['botonOcultoEliminar'])) {
                include('../conexion.php');
                $id = $_GET['id'];
                $query2 = "UPDATE categorias set estado_categoria = 2 WHERE id_categoria=$id";
                mysqli_query($conexion, $query2);

                //             echo "<script type='text/javascript'>alert('La categoría ha sido desactivada');
                // window.location = './adminCategorias.php';
                // </script>";

                echo "<script type='text/javascript'>
                    Swal.fire({
                        icon: 'warning',
                        title: 'Desctivación',
                        text: 'La categoria ha sido desactivada',
                    })
                    window.location = './adminCategorias.php';
                    </script>";
            }
            ?>

            <script>
                if (verificarEliminacion()) {
                    document.getElementById("botonOcultoEliminar").click();
                } else {
                    alert("La categoria sigue activa");
                    window.location = './adminCategorias.php'
                }

                function verificarEliminacion() {
                    let texto = "¿Está seguro de desactivar la categoria?";
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