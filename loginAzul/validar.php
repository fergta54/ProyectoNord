<?php
$usuario = $_POST['usuario'];
$contrasenia = MD5($_POST['contrasenia']);

session_start();
?>
<script>
    // CLAVEEE PERMITE IMPRIMIR EN CONSOLA VARIABLES DE PHP
    console.log(<?= json_encode($contrasenia); ?>);
</script>
<?php


$_SESSION['usuario'] = $usuario;
$_SESSION['rol'] = '';

include("../conexion.php");

$consulta = "SELECT*FROM usuarios where nombre_usuario='$usuario' and contrasenia='$contrasenia'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);

if ($filas) {
    $filas2 = mysqli_fetch_array($resultado);
    if ($filas2) { // administrador
        header("location:../admin.php");
        $_SESSION['rol'] = 'admin';
    } elseif ($filas2['id_rol'] == 2) {
        header("location:../index.php");
        $_SESSION['rol'] = 'cliente';
    } else {
        sleep(2);
        echo "<script type='text/javascript'>alert('Error en la autenticación');
        window.location = './login.php';
        </script>";
    }

    // header("location:../admin.php");
    // $_SESSION['rol'] = $filas[5];
} else {
    sleep(2);
    echo "<script type='text/javascript'>alert('Error en la autenticación');    
    window.location='./login.php';
    </script>";
}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>