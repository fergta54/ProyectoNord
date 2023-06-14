<?php
$id_pedido = "";
$fechaPedido = "";
$proveedor = "";
$situacionPedido = "";
$estadoPedido = 0;

include('../conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id_pedido = $_GET["id_pedido"];

    $sql = "SELECT * FROM pedidos WHERE id_pedido=$id_pedido";
    $result = $conexion->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: ./adminPedidos.php");
        exit;
    }
    $fechaPedido = $row["fecha_pedido"];
    $proveedor = $row["id_proveedor"];
    $situacionPedido = $row["id_situacion_pedido"];
    $estadoPedido = $row["estado_pedido"];
} else {
    $id_pedido = $_POST["id_pedido"];
    $fechaPedido = $_POST["fecha"];
    $proveedor = $_POST["proveedor"];
    $situacionPedido = $_POST["situacion"];
    $estadoPedido = $_POST["estado"];

    do {
        if (empty($id_pedido) || empty($fechaPedido) || empty($proveedor) || empty($situacionPedido) || empty($estadoPedido)) {
            $errorMessage = "Todos los campos deben ser llenados";
            break;
        }
        $sql = "UPDATE pedidos SET fecha_pedido = '$fechaPedido', id_proveedor = '$proveedor', id_situacion_pedido = '$situacionPedido',
         estado_pedido = '$estadoPedido' WHERE id_pedido = $id_pedido";
        $result = $conexion->query($sql);

        if (!$result) {
            $errorMessage = "Consulta invalida: " . $conexion->error;
            break;
        }

        $successMessage = "Informacion editada correctamente";
        header("location: ./adminPedidos.php");
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
    <title>Registro de Pedidos</title>
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
                <h2 class="text-center">Crear Pedido</h2>
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
                        <label for="fecha">FECHA</label><br>
                        <input name="fecha" type="date" class="form-control-lg w-100" id="fecha" value="<?php echo $fechaPedido; ?>">
                    </div>
                    <div class="form-group">
                        <label for="proveedor">Proveedor</label>
                        <select name="proveedor" class="form-control form-control-lg w-100">
                            <?php
                            $query1 = mysqli_query($conexion, "SELECT id_proveedor ,razonSocial_prov FROM proveedores 
                            where estado_prov =1");

                            $verFilas1 = mysqli_num_rows($query1);
                            $valores1 = mysqli_fetch_array($query1);

                            if (!$query1) {
                                echo "Error en la consulta";
                            } else {
                                for ($i = 0; $i < $verFilas1; $i++) {
                                    echo '<option value="' . $valores1[0] . '"' . ($proveedor == $valores1[0] ? 'selected' : '') . '>' . ($i + 1) . " - " . ($valores1[1]) . '</option>';
                                    $valores1 = mysqli_fetch_array($query1);
                                }
                            }
                            ?>
                        </select>
                        <label for="situacion">Situacion</label>
                        <select name="situacion" class="form-control form-control-lg w-100">
                            <?php
                            $query1 = mysqli_query($conexion, "SELECT id_situacion_pedido,situacion_pedido FROM situacion_pedidos 
                            where estado_situacion_pedido  =1");

                            $verFilas1 = mysqli_num_rows($query1);
                            $valores1 = mysqli_fetch_array($query1);

                            if (!$query1) {
                                echo "Error en la consulta";
                            } else {
                                for ($i = 0; $i < $verFilas1; $i++) {
                                    echo '<option value="' . $valores1[0] . '"' . ($situacionPedido == $valores1[0] ? 'selected' : '') . '>' . ($i + 1) . " - " . ($valores1[1]) . '</option>';
                                    $valores1 = mysqli_fetch_array($query1);
                                }
                            }
                            ?>
                        </select>
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
                                    echo '<option value="' . $valores1[0] . '"' . ($estadoPedido == $valores1[0] ? 'selected' : '') . '>' . ($i + 1) . " - " . ($valores1[1]) . '</option>';
                                    $valores1 = mysqli_fetch_array($query1);
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <input type="hidden" name="id_pedido" value="<?php echo $id_pedido; ?>"> <!-- Add this line -->
                    <a href="./adminPedidos.php" class="btn btn-primary btn-danger btn-lg w-100">Cancelar</a> <br><br>
                    <button type="submit" class="btn btn-primary btn-success btn-lg w-100">SIGUIENTE</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
