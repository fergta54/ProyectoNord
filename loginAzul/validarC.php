<?php
$usuario = $_POST['usuario'];
$contrasenia = MD5($_POST['contrasenia']);

session_start();

$_SESSION['usuario'] = $usuario;
$_SESSION['rol'] = '';

include("../conexion.php");

$consultaCliente = "SELECT id_cliente FROM clientes WHERE nombre_cli='$usuario'";
$resultadoCliente = mysqli_query($conexion, $consultaCliente);
$filasCliente = mysqli_num_rows($resultadoCliente);

if ($filasCliente) {
    $row = mysqli_fetch_assoc($resultadoCliente);
    $_SESSION['id_cliente'] = $row['id_cliente'];
    $_SESSION['rol'] = 'cliente';
    header("location: /PROYECTONORD-MAIN/gestionVentas/menuProd.php?id_cliente=" . $row['id_cliente']);
} else {
    sleep(2);
    echo "<script type='text/javascript'>alert('Error en la autenticación');
    window.location = './login.php';
    </script>";
}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>
