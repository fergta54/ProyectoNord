<?php
include("../conexion.php");

// $miLogoCategoria = $_POST['variableLogo'];

// $registro = mysqli_query($conexion, "insert into zpruebaimagenes(cadenaImg) values ('$myPhpVar')")
//     or die("Problemas al registrar la marca" . mysqli_error($conexion));
// mysqli_close($conexion);
// header("location:./mostrarimg.php");
// session_start();
?>
<!-- <script>
    Console.log(<?php echo $_REQUEST['lgCat'] ?>)
</script> -->
<?php
$registros = mysqli_query($conexion, "insert into categorias(nombre_categoria,descripcion_categoria,logo_categoria,estado_categoria) values 
('$_REQUEST[nombreCategoria]','$_REQUEST[descripcionCategoria]','$_REQUEST[lgCat]',1)")
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
header("Location:./adminCategorias.php"); ?>

<br><br>