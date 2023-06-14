<?php
include('../conexion.php');

$fechaPedido = "";
$idprovedor = "";
$situacionPedido = "";
$estadoPedido = 0;

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fechaPedido = $_POST["fecha"];
    $idprovedor = $_POST["proveedor"];
    $situacionPedido = $_POST["situacion"];
    $estadoPedido = $_POST["estado"];

    do {
        if (empty($fechaPedido) || empty($idprovedor)|| empty($situacionPedido)|| empty($estadoPedido)) {
            $errorMessage = "Todos los campos deben ser llenados";
            break;
        }

        //insertar un nuevo rol en la base de datos
        $sql = "INSERT INTO pedidos(fecha_pedido,id_proveedor,id_situacion_pedido,estado_pedido )
         VALUES('$fechaPedido','$idprovedor','$situacionPedido','$estadoPedido')";
        $result = $conexion->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $conexion->error;
            break;
        }
        $fechaPedido = "";
        $idprovedor = "";
        $situacionPedido = "";
        $estadoPedido = 0;

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
                <br><br>
                <form method="post">
                    <div class="form-group ">
                        <label for="exampleInputEmail1">Fecha</label><br>
                        <input name="fecha" type="date" class="form-control-lg w-100 " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa el nombre del rol" value="<?php echo $fechaPedido; ?>">
                    </div>
                    <div class="form-group">
                        <label for="proveedor">PROVEEDOR</label>
                        <select name="proveedor" class="form-control form-control-lg w-100">
                            <?php
                            $query1 = mysqli_query($conexion, "SELECT id_proveedor,razonSocial_prov FROM proveedores 
                        where estado_prov =1");

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
                    <div class="form-group">
                        <label for="situacion">situacion</label>
                        <select name="situacion" class="form-control form-control-lg w-100">
                            <?php
                            $query1 = mysqli_query($conexion, "SELECT id_situacion_pedido ,situacion_pedido FROM situacion_pedidos 
                        where estado_situacion_pedido =1");

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