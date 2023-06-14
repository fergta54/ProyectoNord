<?php

if (isset($_GET['item_linea_id_pedido']) && isset($_POST['botonOcultoEliminar'])) {
    include('../conexion.php');
    $item_linea_id_pedido = $_GET['item_linea_id_pedido'];
    $query2 = "UPDATE pedidos_items set estado_compra  = 2 WHERE item_linea_id_pedido =$item_linea_id_pedido";
    mysqli_query($conexion, $query2);

    echo "<script type='text/javascript'>alert('El item pedido ha sido desactivado');
                    window.location = './adminPedidoItem.php';
                    </script>";
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../recursos/js/jquery-3.7.0.min.js"></script>
</head>

<body>
    <form action="eliminarPedidoItem.php?item_linea_id_pedido=<?php echo $_GET['item_linea_id_pedido']; ?>" method="POST">
        <button type="submit" id="botonOcultoEliminar" name="botonOcultoEliminar" hidden></button>
    </form>
</body>

</html>
<script>
    if (verificarEliminacion()) {
        document.getElementById("botonOcultoEliminar").click();
    } else {
        alert("El pedido sigue activo");
        window.location = './adminProveedores.php'
    }

    function verificarEliminacion() {
        let texto = "¿Está seguro de desactivar el pedido?";
        if (confirm(texto) == true) {
            return true;
        } else {
            return false;
        }
    }
</script>