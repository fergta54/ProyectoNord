<?php
if(isset($_GET["id_usuario"])){
    $id_usuario = $_GET["id_usuario"];

    include('../conexion.php');

    $sql = "UPDATE usuarios SET estado_usuario = 2 WHERE id_usuario = $id_usuario";
    $conexion->query($sql);

    header("location: ./listarUsuarios.php");
    exit;
}
?>
