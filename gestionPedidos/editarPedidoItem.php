
<?php

$item_linea_id_pedido = "";
$id_pedido = "";
$idproducto = "";
$cantidad = "";
$estado = 0;

include('../conexion.php');


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $item_linea_id_pedido = $_GET["item_linea_id_pedido"];

    $sql = "SELECT * FROM pedidos_items WHERE item_linea_id_pedido=$item_linea_id_pedido";
    $result = $conexion->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: ./adminPedidosItem.php");
        exit;
    }
    $id_pedido = $row["id_pedido"];
    $idproducto = $row["id_prod"];
    $cantidad = $row["cantidad_pedido"];
    $estado = $row["estado_compra"];
} else {
    $item_linea_id_pedido = $_POST["item_linea_id_pedido"];
    $id_pedido = $_POST["pedido"];
    $idproducto = $_POST["producto"];
    $cantidad = $_POST["cantidad"];
    $estado = $_POST["estado"];

    do {
        $sql = "UPDATE pedidos_items SET id_pedido = '$id_pedido', id_prod = '$idproducto', cantidad_pedido = '$cantidad',
         estado_compra = '$estado' WHERE item_linea_id_pedido = $item_linea_id_pedido";
        $result = $conexion->query($sql);

        if (!$result) {
            $errorMessage = "Consulta invalida: " . $conexion->error;
            break;
        }

        $successMessage = "Informacion editada correctamente";
        header("location: ./adminPedidosItem.php");
        exit;
    } while (false);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Item de Pedido</title>
    <link rel="stylesheet" href="../recursos/css/index.css">
    <link rel="stylesheet" href="../recursos/css/bootstrap.min.css">
    <script src="../recursos/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../recursos/css/cabecera.css">
    <script src="../recursos/js/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="row">
        <div class="col-2">
            <?php include('../incluir/asideNavAdmin.php') ?>
        </div>
        <div class="col-10">
            <div class="container my-5 w-50">
                <h2 class="text-center">Editar Item</h2>
                <?php
                if (!empty($errorMessage)) {
                ?>
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: '<?php echo $errorMessage; ?>',
                        })
                    </script>
                <?php
                }
                ?>
                <?php
                if (!empty($successMessage)) {
                ?>
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: '<?php echo $successMessage; ?>',
                        })
                    </script>
                <?php
                }
                ?>
                <br><br>
                <form method="post">
                    <div class="form-group">
                        <label for="pedido">PEDIDO</label>
                        <select name="pedido" class="form-control form-control-lg w-100">
                            <?php
                            $query1 = mysqli_query($conexion, "SELECT id_pedido,id_pedido FROM pedidos 
                            where estado_pedido =1");

                            $verFilas1 = mysqli_num_rows($query1);
                            $valores1 = mysqli_fetch_array($query1);

                            if (!$query1) {
                                echo "Error en la consulta";
                            } else {
                                for ($i = 0; $i < $verFilas1; $i++) {
                                    echo '<option value="' . $valores1[0] . '"' . ($id_pedido == $valores1[0] ? 'selected' : '') . '>' . ($i + 1) . " - " . ($valores1[1]) . '</option>';
                                    $valores1 = mysqli_fetch_array($query1);
                                }
                            }
                            ?>
                        </select>
                        <label for="producto">Producto</label>
                        <select name="producto" class="form-control form-control-lg w-100">
                            <?php
                            $query1 = mysqli_query($conexion, "SELECT id_prod,nombre_prod FROM productos 
                            where estado_producto =1");

                            $verFilas1 = mysqli_num_rows($query1);
                            $valores1 = mysqli_fetch_array($query1);

                            if (!$query1) {
                                echo "Error en la consulta";
                            } else {
                                for ($i = 0; $i < $verFilas1; $i++) {
                                    echo '<option value="' . $valores1[0] . '"' . ($idproducto == $valores1[0] ? 'selected' : '') . '>' . ($i + 1) . " - " . ($valores1[1]) . '</option>';
                                    $valores1 = mysqli_fetch_array($query1);
                                }
                            }
                            ?>
                        </select>
                        <div class="form-group">
                        <label for="cantidad">CANTIDAD</label><br>
                        <input name="cantidad" type="number" class="form-control-lg w-100" id="cantidad" value="<?php echo $cantidad; ?>">
                        </div>
                        <label for="estado">Estado</label>
                        <select name="estado" class="form-control form-control-lg w-100">
                            <?php
                            $query1 = mysqli_query($conexion, "SELECT id_estado  ,estado_descripcion FROM estados");

                            $verFilas1 = mysqli_num_rows($query1);
                            $valores1 = mysqli_fetch_array($query1);

                            if (!$query1) {
                                echo "Error en la consulta";
                            } else {
                                for ($i = 0; $i < $verFilas1; $i++) {
                                    echo '<option value="' . $valores1[0] . '"' . ($estado == $valores1[0] ? 'selected' : '') . '>' . ($i + 1) . " - " . ($valores1[1]) . '</option>';
                                    $valores1 = mysqli_fetch_array($query1);
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <input type="hidden" name="item_linea_id_pedido" value="<?php echo $item_linea_id_pedido; ?>"> <!-- Add this line -->
                    <a href="./adminPedidos.php" class="btn btn-primary btn-danger btn-lg w-100">CANCELAR</a> <br><br>
                    <button type="submit" class="btn btn-primary btn-success btn-lg w-100">EDITAR</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
