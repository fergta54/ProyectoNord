<?php

session_start();

require_once ('tarjetas.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menu</title>
    <link rel="stylesheet" href="../recursos/css/ventas.css">
    <link rel="stylesheet" href="../recursos/css/cabecera.css">
    <link rel="stylesheet" href="../recursos/css/bootstrap.min.css">
    <script src="../recursos/js/bootstrap.min.js"></script>
    <!-- Font Awesome carrito -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>


<body>
<?php include('navVentas.php') ?>
productos

<div class="container">
        <div class="row text-center py-5">
            <?php
            include('../conexion.php');
            $seleccionar = mysqli_query(
                $conexion,
                "SELECT pr.id_prod as id,nombre_prod,pr.imagen_prod,pr.precio_unit_compra,pr.estado_producto                        
                FROM productos 
                 where estado_producto=1 order by id_prod"
            );
            $row = mysqli_fetch_array($seleccionar);
            if($seleccionar) {
                while ($row = mysqli_fetch_assoc($seleccionar)){
                    component($row[''] ,$row['nombre_prod'], $row['precio_unit_compra'], $row['imagen_prod'], $row['id']);
                }
            }
               component($row['nombre_prod'], 444,'./upload/product1.png', 1);
            ?>
        </div>
</div>

</body>

</html>