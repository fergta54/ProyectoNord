<?php
if(isset($_GET["id_rol"])){
    $id_rol = $_GET["id_rol"];

    include('../conexion.php');

    $sql = "UPDATE rol SET estado_rol = 1 WHERE id_rol = $id_rol";
    $conexion->query($sql);

    //header("location: ../gestionUsuarios/listarRoles.php");
    echo"<script type='text/javascript'>
        window.location = '../gestionUsuarios/listarRoles.php';
        </script>";
    exit;
}
?>
