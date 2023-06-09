<?php
include('../conexion.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query2 = "UPDATE tiendas set estado_tienda = 1 WHERE id_tienda=$id";
    mysqli_query($conexion, $query2);
 
    
    echo "<script type='text/javascript'>alert('La tienda ha sido activada');
    window.location = './adminTiendas.php';
    </script>";
}
