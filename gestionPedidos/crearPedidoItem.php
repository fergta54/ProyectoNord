<?php
include('../conexion.php');

$idpedido  = "";
$itempedido  = "";
$producto = "";
$cantidad = "";
$estadoCompra = 0;

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idpedido = $_POST["pedido"];
    $itempedido = $_POST["item"];
    $producto = $_POST["producto"];
    $cantidad = $_POST["cantidad"];
    $estadoCompra = $_POST["estado"];

    do {
        if (empty($idpedido) ||empty($itempedido) || empty($producto)|| empty($cantidad)|| empty($estadoCompra)) {
            $errorMessage = "Todos los campos deben ser llenados";
            break;
        }

        //insertar un nuevo rol en la base de datos
        $sql = "INSERT INTO pedidos_items(id_pedido ,item_linea_id_pedido ,id_prod ,cantidad_pedido,estado_compra  )
         VALUES('$idpedido','$itempedido','$producto','$cantidad','$estadoCompra')";
        $result = $conexion->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $conexion->error;
            break;
        }
        $idpedido = "";
        $itempedido = "";
        $producto = "";
        $cantidad = "";
        $estadoCompra = 0;

        $successMessage = "Pedido añadido correctamente";

        header("location: ./listarPedidos.php");
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
    <title>Registro de Item Pedidos</title>
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
                <h2 class="text-center">Añadir Item</h2>

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
                                    echo '<option value="' . $valores1[0] . '">' . ($i + 1) . " - " . ($valores1[1]) . '</option>';
                                    $valores1 = mysqli_fetch_array($query1);
                                }
                            }
                            ?>
                        </select>              
                    </div>
                    <div class="form-group ">
                        <label for="item">ITEM</label><br>
                        <input name="item" type="number" class="form-control-lg w-100 " id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $itempedido; ?>">
                    </div>
                    <div class="form-group">
                        <label for="producto">PRODUCTO</label>
                        <select name="producto" class="form-control form-control-lg w-100">
                            <?php
                            $query1 = mysqli_query($conexion, "SELECT id_prod ,nombre_prod FROM productos 
                        where estado_producto  =1");

                            $verFilas1 = mysqli_num_rows($query1);
                            $valores1 = mysqli_fetch_array($query1);

                            if (!$query1) {
                                echo "Error en la consulta";
                            } else {
                                for ($i = 0; $i < $verFilas1; $i++) {
                                    echo '<option value="' . $valores1[0] . '">' . ($i + 1) . " - " . ($valores1[1]) . '</option>';
                                    $valores1 = mysqli_fetch_array($query1);
                                }
                            }
                            ?>
                        </select>              
                    </div>
                    <div class="form-group ">
                        <label for="cantidad">CANTIDAD</label><br>
                        <input name="cantidad" type="number" class="form-control-lg w-100 " id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $cantidad; ?>">
                    </div>
                    <div class="form-group">
                        <label for="estado">estado</label>
                        <select name="estado" class="form-control form-control-lg w-100">
                            <?php
                            $query1 = mysqli_query($conexion, "SELECT id_estado,estado_descripcion FROM estados
                       ");

                            $verFilas1 = mysqli_num_rows($query1);
                            $valores1 = mysqli_fetch_array($query1);

                            if (!$query1) {
                                echo "Error en la consulta";
                            } else {
                                for ($i = 0; $i < $verFilas1; $i++) {
                                    echo '<option value="' . $valores1[0] . '">' . ($i + 1) . " - " . ($valores1[1]) . '</option>';
                                    $valores1 = mysqli_fetch_array($query1);
                                }
                            }
                            ?>
                        </select>              
                    <?php
                    if (!empty($successMessage)) {
                    ?>
                        <script>
                            Swal.fire({
                                icon: 'succcess',
                                title: 'Error',
                                text: '<?php echo $successMessage; ?>',
                            })
                        </script>
                    <?php
                    }
                    ?>
<br>
                    <a href="listarPedidos.php" class="btn btn-primary btn-danger btn-lg w-100">Cancelar</a> <br><br>
                    <button type="submit" class="btn btn-primary btn-success btn-lg w-100">Crear</button>
                </form>

            </div>
        </div>
    </div>
</body>


</html>