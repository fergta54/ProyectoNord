<?php
$usuario = $_POST['usuario'];
$contrasenia = MD5($_POST['contrasenia']);

session_start();
?>
<script>
    console.log(<?= json_encode($contrasenia); ?>);
</script>
<?php

echo '<script>console.log($_COOKIE["verifContras"])</script>';
?>
<script>
    function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
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
    if ($filas2['id_rol'] == 1) { // administrador
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
} else {
    sleep(2);
    echo "<script type='text/javascript'>alert('Error en la autenticación');    
    window.location='./login.php';
    </script>";
?>
    <script>
        var verifContra = getCookie('verifContras');
        console.log(verifContra)
    </script>
<?php


}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>