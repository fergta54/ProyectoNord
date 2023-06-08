<?php
include("../conexion.php");

// $miLogoCategoria = $_POST['variableLogo'];

// $registro = mysqli_query($conexion, "insert into zpruebaimagenes(cadenaImg) values ('$myPhpVar')")
//     or die("Problemas al registrar la marca" . mysqli_error($conexion));
// mysqli_close($conexion);
// header("location:./mostrarimg.php");
// session_start();


$registros = mysqli_query($conexion, "insert into clientes(nombre_cli,apellido_cli,correo_cli,direccion_cli,telf_cli,contrasenia_cli,foto_cli,estado_cli) values 
('$_REQUEST[nombrecli]','$_REQUEST[apellidocli]','$_REQUEST[correocli]','$_REQUEST[direccioncli]'
,'$_REQUEST[telefonocli]','$_REQUEST[contraseniacli]','$_REQUEST[lgcli]',1)")
    or die("A habido un problema al registrarse" . mysqli_error($conexion));

// $ultimoId = mysqli_insert_id($conexion);
// $a = mysqli_query($conexion, "CALL SP_CargarAsientos22('$ultimoId')");
// $a = mysqli_query($conexion, "CALL SP_RegistrarPrecios('$ultimoId','$_REQUEST[precioEjecutivo]','$_REQUEST[precioComercial]')");

mysqli_close($conexion);
//echo "Informacion grabada con exito";
//echo $_SESSION['IdRegistro'];
?>
<script>
    Alert('Registro Exitoso');
</script>
<?php
header("Location:/PROYECTONORD-MAIN/loginAzul/login.php"); ?>

<br><br>