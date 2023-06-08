<?php
session_start();
require_once ("tarjetas.php");
include('../conexion.php');


if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["id_prod"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
              echo "<script>alert('Producto eliminado')</script>";
              echo "<script>window.location = 'cart.php'</script>";
          }
      }
  }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="../recursos/css/ventas.css">
    <link rel="stylesheet" href="../recursos/css/cabecera.css">
    <link rel="stylesheet" href="../recursos/css/bootstrap.min.css">
    <script src="../recursos/js/bootstrap.min.js"></script>
    <!-- Font Awesome carrito -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>


<body class="bg-light">

<?php include('navVentas.php');?>
<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>Mi Carrito</h6>
                <hr>
                <?php
                $subtotal = 0;
                
                $total = 0;
                    if (isset($_SESSION['cart'])){
                        $id_prod = array_column($_SESSION['cart'], 'id_prod');

                        $seleccionar = mysqli_query(
                            $conexion,
                            "SELECT pr.id_prod as id,pr.nombre_prod,pr.imagen_prod,pr.precio_unit_compra,pr.estado_producto                        
                            FROM productos pr
                             where estado_producto=1 order by id_prod"
                        );
                        while ($row = mysqli_fetch_assoc($seleccionar)){
                            foreach ($id_prod as $id){
                                if ($row['id'] == $id){
                                    cartElement($row['imagen_prod'], $row['nombre_prod'],$row['precio_unit_compra'], $row['id']);
                                    $subtotal += $row['precio_unit_compra']; 
                                    $iva = round($subtotal * 0.13, 2);
                                    $total = round($subtotal + $iva, 2);
                                }
                            }
                        }
                    }else{
                        echo "<h5>Carrito vacio</h5>";
                    }

                ?>

            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>DETALLE DE LA COMPRA</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Subtotal ($count items)</h6>";
                            }else{
                                echo "<h6>Subtotal (0 items)</h6>";
                            }
                        ?>
                        <h6>IVA</h6>
                        <hr>
                        <h6>Total</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>Bs. <?php echo $subtotal; ?></h6>
                        <h6>Bs. <?php echo $iva; ?></h6><hr>
                        <h6>Bs. <?php echo $total; ?></h6>                        
                    </div>                    
                </div>
                <div id="paypal-payment-button">
            </div>
        </div>
    </div>
</div>
<script src="https://www.paypal.com/sdk/js?client-id=ATqJoT8uledW83BN2RvdA4o9tptMnGw4EUVlV1na6YHhKgqXEHcJXE8t0EZLGsDr4mybfMJ5nXxL10vQ&disable-funding=credit,card"></script>
    <script src="PayPal.js"></script>
</body>
</html>