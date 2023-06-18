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





session_start();

// Función para decrementar la cantidad
function decrementQuantity($productId) {
    if ($_SESSION['cart'][$productId]['quantity'] > 1) {
        $_SESSION['cart'][$productId]['quantity'] -= 1;
    }
}

// Función para incrementar la cantidad
function incrementQuantity($productId) {
    $_SESSION['cart'][$productId]['quantity'] += 1;
}

// Código para agregar productos al carrito
if (isset($_POST['add'])) {
    if (isset($_SESSION['cart'])) {
        $item_array_id = array_column($_SESSION['cart'], "id_prod");

        if (in_array($_POST['id_prod'], $item_array_id)) {
            echo "<script>alert('El producto ya está en el carrito')</script>";
        } else {
            // Verificar el stock del producto en la tienda
            $producto_id = $_POST['id_prod'];
            $tienda_id = $_SESSION['selected_tienda'];

            $verificar_stock = mysqli_query($conexion, "SELECT stock_inventario FROM inventarios WHERE id_producto = $producto_id AND id_tienda = $tienda_id");
            $fila_stock = mysqli_fetch_assoc($verificar_stock);

            if ($fila_stock && $fila_stock['stock_inventario'] > 0) {
                $count = count($_SESSION['cart']);
                $item_array = array(
                    'id_prod' => $_POST['id_prod'],
                    'quantity' => 1  // Agrega la cantidad inicial del producto
                );

                $_SESSION['cart'][$count] = $item_array;
                echo "<script>alert('Producto agregado al carrito')</script>";
            } else {
                echo "<script>alert('El producto seleccionado no está disponible en el inventario de la tienda')</script>";
            }
        }
    } else {
        // Verificar el stock del producto en la tienda
        $producto_id = $_POST['id_prod'];
        $tienda_id = $_SESSION['selected_tienda'];

        $verificar_stock = mysqli_query($conexion, "SELECT stock_inventario FROM inventarios WHERE id_producto = $producto_id AND id_tienda = $tienda_id");
        $fila_stock = mysqli_fetch_assoc($verificar_stock);

        if ($fila_stock && $fila_stock['stock_inventario'] > 0) {
            $item_array = array(
                'id_prod' => $_POST['id_prod'],
                'quantity' => 1  // Agrega la cantidad inicial del producto
            );
            // Create new session variable
            $_SESSION['cart'][0] = $item_array;
            echo "<script>alert('Producto agregado al carrito')</script>";
        } else {
            echo "<script>alert('El producto seleccionado no está disponible en el inventario de la tienda')</script>";
        }
    }
}

// Procesar las acciones de incremento o decremento
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['productId'];
    $action = $_POST['action'];

    if ($action === 'decrement') {
        decrementQuantity($productId);
    } elseif ($action === 'increment') {
        incrementQuantity($productId);
    }

    // Redireccionar para evitar el reenvío del formulario
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Obtener el total de productos agregados al carrito
$totalQuantity = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $totalQuantity += $item['quantity'];
    }
}






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



<script>
/*
// Función para decrementar la cantidad
function decrementQuantity(productId) {
    let quantityInput = document.getElementById(`quantity-${productId}`);
    let currentQuantity = parseInt(quantityInput.value);

    if (currentQuantity > 2) {
        let newQuantity = currentQuantity - 1;
        quantityInput.value = newQuantity;
    }
}

// Función para incrementar la cantidad
function incrementQuantity(productId) {
    let quantityInput = document.getElementById(`quantity-${productId}`);
    let currentQuantity = parseInt(quantityInput.value);

    let newQuantity = currentQuantity + 1;
    quantityInput.value = newQuantity;
}

// Escucha los eventos de clic en los botones de incremento y decremento
document.addEventListener('click', function(event) {
    if (event.target.classList.contains('decrement-btn')) {
        let productId = event.target.dataset.productid;
        decrementQuantity(productId);
    } else if (event.target.classList.contains('increment-btn')) {
        let productId = event.target.dataset.productid;
        incrementQuantity(productId);
    }
});*/

</script>


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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                
                // Obtener todos los productos del carrito y calcular subtotal
                if (isset($_SESSION['cart'])) {
                    $id_prod = array_column($_SESSION['cart'], 'id_prod');
                
                    $seleccionar = mysqli_query(
                        $conexion,
                        "SELECT pr.id_prod as id, pr.nombre_prod, pr.imagen_prod, pr.precio_unit_compra, pr.estado_producto
                        FROM productos pr
                        WHERE estado_producto = 1
                        ORDER BY id_prod"
                    );
                
                    while ($row = mysqli_fetch_assoc($seleccionar)) {
                        foreach ($id_prod as $id) {
                            if ($row['id'] == $id) {
                                // Establecer la cantidad predeterminada en 1 si se detecta el producto en el carrito
                                $quantity = isset($_SESSION['cart'][$id]['quantity']) ? $_SESSION['cart'][$id]['quantity'] : 1;
                                cartElement($row['imagen_prod'], $row['nombre_prod'], $row['precio_unit_compra'], $row['id'], $quantity);
                                $subtotal += $row['precio_unit_compra'] * $quantity;
                            }
                        }
                    }
                
                    $iva = round($subtotal * 0.13, 2);
                    $total = round($subtotal + $iva, 2);
                } else {
                    echo "<h5>Carrito vacío</h5>";
                }
                
                
                
                
                ?>
                </div>
            </div>

            <!-- Aquí se muestra la interfaz -->
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
                <div class="pt-4">
                    <h6>DETALLE DE LA COMPRA</h6>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                        <?php
if (isset($_SESSION['cart'])) {
    $count = count($_SESSION['cart']);
    $itemText = ($count != 1) ? 'items' : 'item';
    echo "<h6>Subtotal ($count $itemText)</h6>";
} else {
    echo "<h6>Subtotal (0 items)</h6>";
}
?>






                <h6>IVA</h6>
                <hr>
                <h6>Total</h6>
            </div>
            <div class="col-md-6">
                <h6>Bs. <?php echo $subtotal; ?></h6>
                <h6>Bs. <?php echo $iva; ?></h6>
                <hr>
                <h6>Bs. <?php echo $total; ?></h6>
            </div>
        </div><br>
        <div id="paypal-payment-button">
    </div>
</div>

<script src="https://www.paypal.com/sdk/js?client-id=ATqJoT8uledW83BN2RvdA4o9tptMnGw4EUVlV1na6YHhKgqXEHcJXE8t0EZLGsDr4mybfMJ5nXxL10vQ&disable-funding=credit,card"></script>
    <script src="PayPal.js"></script>
</body>
<?php include('../incluir/footer.php'); ?>

</html>