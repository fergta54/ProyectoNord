<?php
session_start();
require_once ("tarjetas.php");
include('../conexion.php');


//este codigo limpia el carrito una vez agregado a la base de datos
/*
session_start();
include('../conexion.php');
require_once('tarjetas.php');

if (isset($_POST['guardar'])) {
    $id_cliente = 1; // Asignar el id_cliente directamente como 1
    $id_tienda = $_SESSION['selected_tienda']; // Obtener el ID de tienda seleccionado del formulario

    // Conecta a la base de datos utilizando la lógica definida en el archivo de conexión (conexion.php)
    // ...

    // Inserta un nuevo registro en la tabla ventas para almacenar la información general de la venta
    $sql_insert_venta = "INSERT INTO ventas (fecha_venta, id_cliente, id_tienda, id_situacion_venta, estado_venta)
                         VALUES (CURDATE(), $id_cliente, $id_tienda, 7, 1)";
    $result_insert_venta = mysqli_query($conexion, $sql_insert_venta);

    if ($result_insert_venta) {
        // Si la inserción en la tabla ventas fue exitosa, procede con la inserción en la tabla ventas_items
        $id_venta = mysqli_insert_id($conexion);

        foreach ($_SESSION['cart'] as $item) {
            $id_prod = $item['id_prod'];

            // Obtén la información del producto desde la tabla "productos"
            $sql_select_producto = "SELECT * FROM productos WHERE id_prod = $id_prod";
            $result_select_producto = mysqli_query($conexion, $sql_select_producto);
            $row_producto = mysqli_fetch_assoc($result_select_producto);

            $precio_unidad_venta = $row_producto['precio_unit_compra']; // Obtén el precio del producto desde la tabla "productos"

            // Inserta un nuevo registro en la tabla ventas_items para cada producto del carrito
            $sql_insert_venta_item = "INSERT INTO ventas_items (id_venta, id_prod, precio_unidad_venta, cantidad_venta, estado_venta)
                                      VALUES ($id_venta, $id_prod, $precio_unidad_venta, 1, 1)";
            $result_insert_venta_item = mysqli_query($conexion, $sql_insert_venta_item);

            if (!$result_insert_venta_item) {
                // Maneja el error en caso de que la inserción en la tabla ventas_items falle
                echo "Error al insertar el producto con id_prod $id_prod en la tabla ventas_items.";
                // Puedes hacer un rollback de las inserciones anteriores si es necesario
                // También puedes agregar lógica adicional para manejar el error de forma adecuada
            }
        }

        $_SESSION['cart'] = array();

        header("Location: menuProd.php");
        exit();
    } else {
        // Maneja el error en caso de que la inserción en la tabla ventas falle
        echo "Error al insertar la venta en la tabla ventas.";
        // Puedes agregar lógica adicional para manejar el error de forma adecuada
    }
}*/


//este codigo funciona con un id_clinete ne especifico!!
session_start();
include('../conexion.php');
require_once('tarjetas.php');

if (isset($_POST['guardar'])) {
    $id_cliente = 1; // Asignar el id_cliente directamente como 1
    $id_tienda = $_SESSION['selected_tienda']; // Obtener el ID de tienda seleccionado del formulario

    // Conecta a la base de datos utilizando la lógica definida en el archivo de conexión (conexion.php)
    // ...

    // Inserta un nuevo registro en la tabla ventas para almacenar la información general de la venta
    $sql_insert_venta = "INSERT INTO ventas (fecha_venta, id_cliente, id_tienda, id_situacion_venta, estado_venta)
                         VALUES (CURDATE(), $id_cliente, $id_tienda, 7, 1)";
    $result_insert_venta = mysqli_query($conexion, $sql_insert_venta);

    if ($result_insert_venta) {
        // Si la inserción en la tabla ventas fue exitosa, procede con la inserción en la tabla ventas_items
        $id_venta = mysqli_insert_id($conexion);

        foreach ($_SESSION['cart'] as $item) {
            $id_prod = $item['id_prod'];

            // Obtén la información del producto desde la tabla "productos"
            $sql_select_producto = "SELECT * FROM productos WHERE id_prod = $id_prod";
            $result_select_producto = mysqli_query($conexion, $sql_select_producto);
            $row_producto = mysqli_fetch_assoc($result_select_producto);

            $precio_unidad_venta = $row_producto['precio_unit_compra']; // Obtén el precio del producto desde la tabla "productos"

            // Inserta un nuevo registro en la tabla ventas_items para cada producto del carrito
            $sql_insert_venta_item = "INSERT INTO ventas_items (id_venta, id_prod, precio_unidad_venta, cantidad_venta, estado_venta)
                                      VALUES ($id_venta, $id_prod, $precio_unidad_venta, 1, 1)";
            $result_insert_venta_item = mysqli_query($conexion, $sql_insert_venta_item);

            if (!$result_insert_venta_item) {
                // Maneja el error en caso de que la inserción en la tabla ventas_items falle
                echo "Error al insertar el producto con id_prod $id_prod en la tabla ventas_items.";
                // Puedes hacer un rollback de las inserciones anteriores si es necesario
                // También puedes agregar lógica adicional para manejar el error de forma adecuada
            }
        }

        header("Location: cart.php");
        exit();
    } else {
        // Maneja el error en caso de que la inserción en la tabla ventas falle
        echo "Error al insertar la venta en la tabla ventas.";
        // Puedes agregar lógica adicional para manejar el error de forma adecuada
    }
}

/*
//este codigo verifica el id_cliente
session_start();
include('../conexion.php');
require_once('tarjetas.php');

if (isset($_POST['guardar'])) {
    if (isset($_SESSION['id_cliente'])) {
        $id_cliente = $_SESSION['id_cliente'];
        $id_tienda = $_SESSION['selected_tienda']; // Obtener el ID de tienda seleccionado del formulario

        // Conecta a la base de datos utilizando la lógica definida en el archivo de conexión (conexion.php)
        // ...

        // Inserta un nuevo registro en la tabla ventas para almacenar la información general de la venta
        $sql_insert_venta = "INSERT INTO ventas (fecha_venta, id_cliente, id_tienda, id_situacion_venta, estado_venta)
                             VALUES (CURDATE(), $id_cliente, $id_tienda, 7, 1)";
        $result_insert_venta = mysqli_query($conexion, $sql_insert_venta);

        if ($result_insert_venta) {
            // Si la inserción en la tabla ventas fue exitosa, procede con la inserción en la tabla ventas_items
            $id_venta = mysqli_insert_id($conexion);

            foreach ($_SESSION['cart'] as $item) {
                $id_prod = $item['id_prod'];

                // Obtén la información del producto desde la tabla "productos"
                $sql_select_producto = "SELECT * FROM productos WHERE id_prod = $id_prod";
                $result_select_producto = mysqli_query($conexion, $sql_select_producto);
                $row_producto = mysqli_fetch_assoc($result_select_producto);

                $precio_unidad_venta = $row_producto['precio_unit_compra']; // Obtén el precio del producto desde la tabla "productos"

                // Inserta un nuevo registro en la tabla ventas_items para cada producto del carrito
                $sql_insert_venta_item = "INSERT INTO ventas_items (id_venta, id_prod, precio_unidad_venta, cantidad_venta, estado_venta)
                                          VALUES ($id_venta, $id_prod, $precio_unidad_venta, 1, 1)";
                $result_insert_venta_item = mysqli_query($conexion, $sql_insert_venta_item);

                if (!$result_insert_venta_item) {
                    // Maneja el error en caso de que la inserción en la tabla ventas_items falle
                    echo "Error al insertar el producto con id_prod $id_prod en la tabla ventas_items.";
                    // Puedes hacer un rollback de las inserciones anteriores si es necesario
                    // También puedes agregar lógica adicional para manejar el error de forma adecuada
                }
            }

            header("Location: menuProd.php");
            exit();
        } else {
            // Maneja el error en caso de que la inserción en la tabla ventas falle
            echo "Error al insertar la venta en la tabla ventas.";
            // Puedes agregar lógica adicional para manejar el error de forma adecuada
        }
    } else {
        header("Location: registrarCliente.php");
        exit();
    }
}*/



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

<?php include('navVentas.php') ?>

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h3>MI CARRITO</h3>
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
<?php include('../incluir/footer.php'); ?>
</html>