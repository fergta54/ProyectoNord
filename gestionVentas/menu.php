<?php

session_start();

require_once ('tarjetas.php');

include('../conexion.php');

if (isset($_POST['add'])){
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "id_prod");

        if(in_array($_POST['id_prod'], $item_array_id)){
            echo "<script>alert('El producto ya esta en el carrito')</script>";
            echo "<script>window.location = 'menu.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'id_prod' => $_POST['id_prod']
            );

            $_SESSION['cart'][$count] = $item_array;
        }
    }else{
        $item_array = array(
                'id_prod' => $_POST['id_prod']
        );
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}

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
                "SELECT pr.id_prod as id,pr.nombre_prod,pr.imagen_prod,pr.precio_unit_compra,pr.estado_producto                        
                FROM productos pr
                 where estado_producto=1 order by id_prod"
            );
            if($seleccionar) {
                while ($row = mysqli_fetch_assoc($seleccionar)){
                    component($row['nombre_prod'], $row['precio_unit_compra'], $row['imagen_prod'], $row['id']);
                }
            }
            ?>
        </div>
</div>

</body>

</html>