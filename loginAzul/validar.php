<?php
$usuario = $_POST['usuario'];
$contrasenia = $_POST['contrasenia'];
session_start();
$_SESSION['usuario'] = $usuario;
$_SESSION['rol'] = '';

include("../conexion.php");

$consulta = "SELECT*FROM usuarios where nombre_usuario='$usuario' and contrasenia='$contrasenia'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);

if ($filas) {
    $filas2 = mysqli_fetch_array($resultado);
    if ($filas2['id_rol'] == 1) { // administrador
        header("location:../admin.php");
        $_SESSION['rol'] = 'admin';
    } else 
    if ($filas2['id_rol'] == 2) {
        header("location:../index.php");
        $_SESSION['rol'] = 'cliente';
    } else {
?>

        <h1 class="bad">ERROR EN LA AUTENTICACION</h1>

    <?php
        echo "<script type='text/javascript'>alert('Error en la autenticación');</script>";
        sleep(5);
        header("location:../index.php");
    }
} else {


    ?>
    <h1 class="bad">ERROR EN LA AUTENTICACION</h1>
<?php
    echo "<script type='text/javascript'>alert('Error en la autenticación');</script>";
    sleep(2);
    header("location:../index.php");
}

mysqli_free_result($resultado);
mysqli_close($conexion);
