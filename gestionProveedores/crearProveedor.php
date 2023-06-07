<?php
include("../conexion.php");

// $miLogoCategoria = $_POST['variableLogo'];

// $registro = mysqli_query($conexion, "insert into zpruebaimagenes(cadenaImg) values ('$myPhpVar')")
//     or die("Problemas al registrar la marca" . mysqli_error($conexion));
// mysqli_close($conexion);
// header("location:./mostrarimg.php");
// session_start();


$registros = mysqli_query($conexion, "insert into proveedores(razonSocial_prov,correo_prov,telf_prov,direccion_prov,estado_prov) values 
('$_REQUEST[razonsocialProveedor]','$_REQUEST[correoProveedor]','$_REQUEST[telefonoProveedor]','$_REQUEST[direccionProveedor]',1)")
    or die("Problemas al registrar el proveedor" . mysqli_error($conexion));

// $ultimoId = mysqli_insert_id($conexion);
// $a = mysqli_query($conexion, "CALL SP_CargarAsientos22('$ultimoId')");
// $a = mysqli_query($conexion, "CALL SP_RegistrarPrecios('$ultimoId','$_REQUEST[precioEjecutivo]','$_REQUEST[precioComercial]')");

mysqli_close($conexion);
//echo "Informacion grabada con exito";
//echo $_SESSION['IdRegistro'];
?>
<script>
    Alert('Proveedor registrado con éxito');
</script>
<?php
header("Location:./listarProveedores.php"); ?>

<br><br>