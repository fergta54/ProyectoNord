<?php
if (isset($_GET['id_pr']) && isset($_POST['botonOcultoAgregar'])) {
    include('../conexion.php');
    // $idProducto = $_GET['id_pr'];
    // $idTienda = $_GET['id_tiend'];
    $query2 = "INSERT into inventarios(id_tienda,id_producto,stock_inventario,estado_inventario) 
    VALUES ('$_GET[id_tiend]','$_GET[id_pr]',0,1)";
    mysqli_query($conexion, $query2);


    //ESTO SIRVE PARA OBTENER EL ULTIMO ID_INVENTARIO INSERTADO
    $queryId = "select last_insert_id();";
    $resultado = mysqli_query($conexion, $queryId);
    if (mysqli_num_rows($resultado) == 1) {
        $fila = mysqli_fetch_array($resultado);
        $lastIdInv = $fila[0];
    }

    echo "<script type='text/javascript'>alert('El producto ha sido agregado al inventario de la tienda');
    window.location = './modificarStockProducto.php?id_inv=" . $lastIdInv . "'
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
    <form action="agrProdEspec.php?id_pr=<?php echo $_GET['id_pr']; ?>&id_tiend=<?php echo $_GET['id_tiend']; ?>" method="POST">
        <button type="submit" id="botonOcultoAgregar" name="botonOcultoAgregar" hidden></button>
    </form>
</body>

</html>
<script>
    if (verificarEliminacion()) {
        document.getElementById("botonOcultoAgregar").click();
    } else {
        alert("Se canceló el procedimiento");
        window.location = "./agregarProductosInv.php?id=<?php echo $_GET['id_tiend'] ?>"
    }

    function verificarEliminacion() {
        let texto = "¿Desea agregar el producto al inventario?";
        if (confirm(texto) == true) {
            return true;
        } else {
            return false;
        }
    }
</script>