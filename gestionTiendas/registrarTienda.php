<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de tiendas</title>
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

            // $miLogoCategoria = $_POST['variableLogo'];

            // $registro = mysqli_query($conexion, "insert into zpruebaimagenes(cadenaImg) values ('$myPhpVar')")
            //     or die("Problemas al registrar la marca" . mysqli_error($conexion));
            // mysqli_close($conexion);
            // header("location:./mostrarimg.php");
            // session_start();


            $registros = mysqli_query($conexion, "insert into tiendas(nombre_tienda,direccion_tienda, latitud_tienda,longitud_tienda,foto_tienda,estado_tienda) values 
('$_REQUEST[nombreTienda]','$_REQUEST[direccionTienda]','$_REQUEST[latitudTienda]','$_REQUEST[longitudTienda]','$_REQUEST[lgTiend]',1)")
                or die("Problemas al registrar la marca" . mysqli_error($conexion));

            mysqli_close($conexion);


            //     echo "<script type='text/javascript'>alert('Tienda registrada con éxito');
            // window.location = './listarTiendas.php';
            // </script>";
            echo "<script type='text/javascript'>
        Swal.fire({
            icon: 'success',
            title: 'Activación',
            text: 'Tienda registrada con éxito',
        })
        window.location = './listarTiendas.php';
        </script>";
            ?>

        </div>
    </div>
</body>


</html>