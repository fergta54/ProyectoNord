<?php

session_start();
include('../conexion.php');
require_once ('tarjetas.php');



if (isset($_POST['add'])){
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "id_prod");

        if(in_array($_POST['id_prod'], $item_array_id)){
            echo "<script>alert('El producto ya esta en el carrito')</script>";
            echo "<script>window.location = 'menuProd.php'</script>";
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
        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menuProd</title>
    <link rel="stylesheet" href="../recursos/css/ventas.css">
    <link rel="stylesheet" href="../recursos/css/cabecera.css">
    <link rel="stylesheet" href="../recursos/css/index.css">
    <link rel="stylesheet" href="../recursos/css/bootstrap.min.css">
    <script src="../recursos/js/bootstrap.min.js"></script>
    <!-- Font Awesome carrito -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
     .product-wrapper {
  display: flex;
  justify-content: center;
}

.centered-container {
  max-width: 800px; /* Ajusta el ancho máximo según tus necesidades */
}

.product-box {
  border: 4px solid #ccc;
  padding: 20px;
}

    </style>
</head>

<body>
<?php include('navVentas.php'); ?><br>
    <?php
    include('../conexion.php');


    function individualProd($productName, $productImage, $productPrice, $productDescription, $brandName, $categoryName) {
        $element = '
        <div class="product-container">
            <div class="product-image">
                <img src="' . $productImage . '" alt="Product Image">
            </div>
            <div class="product-details">
                <h2 class="product-name">' . $productName . '</h2><br>
                <p class="new-price">Precio: Bs. ' . $productPrice . '</p>
                <p class="description">Descripción: ' . $productDescription . '</p>
                <p class="brand">Marca: ' . $brandName . '</p>
                <p class="category">Categoría: ' . $categoryName . '</p>

                <input type="hidden" name="id_prod" value='.$productid.'>
                <button type="submit" class="btn btn-warning my-3" name="add">Añadir al carrito</button>
                

            </div>
        </div>'; 
        echo '<div class="product-wrapper">
                  <div class="centered-container">
                      <div class="product-box">' . $element . '</div>
                  </div>
              </div>';
    }
    
    
    $seleccionar = mysqli_query(
        $conexion,
        "SELECT pr.id_prod as id,nombre_prod,pr.imagen_prod,pr.precio_unit_compra,marcas.nombre_marca,                        
                        pr.descripcion_prod,cat.nombre_categoria,pr.estado_producto,pr.id_marca,pr.id_categoria                         
                        FROM productos pr inner join categorias cat on pr.id_categoria=cat.id_categoria
                            inner join marcas on pr.id_marca=marcas.id_marca
                         where estado_producto=1 order by nombre_prod"
    );
    
    if ($seleccionar) {
        $row = mysqli_fetch_assoc($seleccionar);
        individualProd($row['nombre_prod'], $row['imagen_prod'], $row['precio_unit_compra'], $row['descripcion_prod'], $row['nombre_marca'], $row['nombre_categoria']);
    }
    
    ?>

</body>
<?php include('../incluir/footer.php'); ?>
</html>


