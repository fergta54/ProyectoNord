<?php
include('../conexion.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // $query = "SELECT * FROM marcas WHERE id_marca=$id";
    // $result = mysqli_query($conexion, $query);
    // if (mysqli_num_rows($result) == 1) {
    //     $row = mysqli_fetch_array($result);
    //     $nombre = $row['nombre_marca'];
    //     $descripcion = $row['descripcion_marca'];
    // }
    $query2 = "UPDATE productos set estado_producto = 1 WHERE id_prod=$id";
    mysqli_query($conexion, $query2);

    echo "<script type='text/javascript'>alert('El producto ha sido habilitado');
    window.location = './adminProductos.php';
    </script>";
}
