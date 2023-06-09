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


echo "<script type='text/javascript'>alert('Tienda registrada con éxito');
        window.location = './listarTiendas.php';
        </script>";
