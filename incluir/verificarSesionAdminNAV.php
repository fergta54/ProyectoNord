<?php
// seguridad de sesiones paginacion
session_start();
$varSession = null;
$varRol = null;
if (isset($_SESSION['usuario'])) {
    $varSession = $_SESSION['usuario'];
    $varRol = $_SESSION['rol'];
}
if ($varSession == null || $varSession = '' || $varRol != 'admin') {
    echo 'NO TIENES ACCESSO';
    header("Location:../loginAzul/login.php");
    die();
}
?>