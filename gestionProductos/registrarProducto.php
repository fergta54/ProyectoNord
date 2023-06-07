<?php
include("../conexion.php");

// $miLogoCategoria = $_POST['variableLogo'];

// $registro = mysqli_query($conexion, "insert into zpruebaimagenes(cadenaImg) values ('$myPhpVar')")
//     or die("Problemas al registrar la marca" . mysqli_error($conexion));
// mysqli_close($conexion);
// header("location:./mostrarimg.php");
// session_start();


$registros = mysqli_query($conexion, "insert into productos(nombre_prod,imagen_prod,precio_unit_compra,id_marca,
descripcion_prod,id_categoria,estado_producto) values 
('$_REQUEST[nombreProducto]','$_REQUEST[lgPr]','$_REQUEST[precioProducto]','$_REQUEST[marcaProd]',
'$_REQUEST[descripcionProducto]','$_REQUEST[catProd]',1)")
    or die("Problemas al registrar la marca" . mysqli_error($conexion));

// $ultimoId = mysqli_insert_id($conexion);
// $a = mysqli_query($conexion, "CALL SP_CargarAsientos22('$ultimoId')");
// $a = mysqli_query($conexion, "CALL SP_RegistrarPrecios('$ultimoId','$_REQUEST[precioEjecutivo]','$_REQUEST[precioComercial]')");

mysqli_close($conexion);
//echo "Informacion grabada con exito";
//echo $_SESSION['IdRegistro'];
?>
<script>
    Alert('Marca registrada con éxito');
</script>
<?php
header("Location:./adminProductos.php"); ?>

<br><br>