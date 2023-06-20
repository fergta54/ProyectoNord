<?php
if(isset($_GET["id_usuario"])){
    $id_usuario = $_GET["id_usuario"];

    include('../conexion.php');

    $sql = "UPDATE usuarios SET estado_usuario = 1 WHERE id_usuario = $id_usuario";
    $conexion->query($sql);

    //header("location: ./listarUsuarios.php");
    echo"<script type='text/javascript'>
        window.location = './listarUsuarios.php';
        </script>";
    exit;
}
?>
