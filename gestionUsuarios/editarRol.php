
<?php
    $id_rol = "";
    $nombreRol = "";
    $estadoRol = 0;

    include('../conexion.php');

    if($_SERVER['REQUEST_METHOD'] == 'GET' ) {
        if(!isset($_GET["id_rol"])){
            header("location: ../gestionUsuarios/listarRoles.php");
            exit;
        }

        $id_rol = $_GET["id_rol"];

        $sql = "SELECT * FROM rol WHERE id_rol=$id_rol";
        $result = $conexion->query($sql);
        $row = $result->fetch_assoc();

        if(!$row){
            header("location: ../gestionUsuarios/listarRoles.php");
            exit;
        }

        $nombreRol = $row["nombre_rol"];
        $estadoRol = $row["estado_rol"];
    }
    else{
        $id_rol = $_POST["id_rol"];
        $nombreRol = $_POST["nombre"];
        $estadoRol = $_POST["estado"];

        do {
            if(empty($id_rol) || empty($nombreRol) || empty($estadoRol)){
                $errorMessage = "Todos los campos deben ser llenados";
                break;
            }
            $sql = "UPDATE rol SET nombre_rol = '$nombreRol', estado_rol = '$estadoRol' WHERE id_rol = $id_rol";
            $result = $conexion->query($sql);

            if(!$result) {
                $errorMessage = "Consulta invalida: " . $conexion->error;
                break;
            }

            $successMessage = "Informacion editada correctamente";
            header("location: ../gestionUsuarios/listarRoles.php");
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
    <title>Lista de Roles</title>
    <link rel="stylesheet" href="../recursos/css/index.css">
    <link rel="stylesheet" href="../recursos/css/bootstrap.min.css">
    <script src="../recursos/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../recursos/css/cabecera.css">
    <script src="../recursos/js/jquery-3.7.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
        include('../incluir/barraNavAdmin.php')
    ?>
    <div class="container my-5 w-50">
        <h2 class="text-center">Crear Rol</h2>

        <?php
        if(!empty($errorMessage)) {
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
            <input name="id_rol" type="hidden" value="<?php echo $id_rol; ?>">
            <div class="form-group ">
                <label for="exampleInputEmail1">Nombre Rol</label><br>
                <input name="nombre" type="text" class="form-control-lg w-100 " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa el nombre del rol" value="<?php echo $nombreRol; ?>">
            </div>
            <div class="form-group">
                <label for="comboEstado">Estado</label>
                <select name="estado" class="form-control form-control-lg w-100">
                    <option value="1">Activado</option>
                    <option value="2">Desactivado</option>
                </select>
            </div>
            
            <?php
            if(!empty($successMessage)) {
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

            <a href="../gestionUsuarios/listarRoles.php" class="btn btn-primary btn-danger btn-lg w-100">Cancelar</a> <br><br>
            <button  type="submit" class="btn btn-primary btn-success btn-lg w-100">Crear</button>
        </form>

    </div>
</body>


</html>