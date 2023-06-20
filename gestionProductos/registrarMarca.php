<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de marcas</title>
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
            include("../conexion.php");
            session_start();
            $registros = mysqli_query($conexion, "insert into marcas(nombre_marca,descripcion_marca,estado_marca) values ('$_REQUEST[nombreMarca]','$_REQUEST[descripcionMarca]',1)")
                or die("Problemas al registrar la marca" . mysqli_error($conexion));

            // $ultimoId = mysqli_insert_id($conexion);
            // $a = mysqli_query($conexion, "CALL SP_CargarAsientos22('$ultimoId')");
            // $a = mysqli_query($conexion, "CALL SP_RegistrarPrecios('$ultimoId','$_REQUEST[precioEjecutivo]','$_REQUEST[precioComercial]')");

            mysqli_close($conexion);


            //     echo "<script type='text/javascript'>alert('Marca registrada con éxito');
            // window.location = './listarMarcas.php';
            // </script>";

            echo "<script type='text/javascript'>
        Swal.fire({
            icon: 'success',
            title: 'Activación',
            text: 'Marca registrada con éxito',
        })
        window.location = './listarMarcas.php';
        </script>";

            ?>
        </div>
    </div>
</body>


</html>