<?php
$id_usuario = "";
$nombre_completo = "";
$nombre_usuario = "";
$correo_usuario = "";
$contrasenia = "";
$id_rol = 0;
$estadoUsuario = 0;

include('../conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["id_usuario"])) {
        header("location: ../gestionUsuarios/listarUsuarios.php");
        exit;
    }

    $id_usuario = $_GET["id_usuario"];

    $sql = "SELECT * FROM usuarios WHERE id_usuario=$id_usuario";
    $result = $conexion->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: ../gestionUsuarios/listarUsuarios.php");
        exit;
    }

    

    $nombre_completo = $row["nombre_completo"];
    $nombre_usuario = $row["nombre_usuario"];
    $correo_usuario = $row["correo_usuario"];
    $contrasenia = $row["contrasenia"];
    $id_rol = $row["id_rol"];
    $estadoUsuario = $row["estado_usuario"];
} else {

    $id_usuario = $_POST["id_usuario"];
    $nombre_completo = $_POST["nombre"];
    $nombre_usuario = $_POST["usuario"];
    $correo_usuario = $_POST["correo"];
    $contrasenia = $_POST["contrasenia"];
    $id_rol = $_POST["rol"];
    $estadoUsuario = $_POST["estado"];

    do {
        if (empty($id_usuario) || empty($nombre_completo) || empty($nombre_usuario) || empty($correo_usuario) || empty($contrasenia) || empty($id_rol) || empty($estadoUsuario)) {
            $errorMessage = "Todos los campos deben ser llenados";
            break;
        }
        $sql = "UPDATE usuarios SET nombre_completo = '$nombre_completo', nombre_usuario = '$nombre_usuario', correo_usuario = '$correo_usuario', contrasenia = MD5('$contrasenia'), id_rol = '$id_rol', estado_usuario = '$estadoUsuario' WHERE id_usuario = $id_usuario";
        $result = $conexion->query($sql);

        if (!$result) {
            $errorMessage = "Consulta invalida: " . $conexion->error;
            break;
        }

        $successMessage = "Informacion editada correctamente";
        header("location: ../gestionUsuarios/listarUsuarios.php");
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
    <title>Edicion de Usuarios</title>
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
                <h2 class="text-center">Crear Usuario</h2>

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
                        <input name="id_usuario" type="hidden" value="<?php echo $id_usuario; ?>">

                        <label for="exampleInputEmail1">Nombre Completo</label><br>
                        <input name="nombre" type="text" class="form-control-lg w-100 " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa el nombre del usuario" value="<?php echo $nombre_completo; ?>">

                        <label for="exampleInputEmail1">Nombre de Usuario</label><br>
                        <input name="usuario" type="text" class="form-control-lg w-100 " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa el usuario" value="<?php echo $nombre_usuario; ?>">

                        <label for="exampleInputEmail1">Correo Electronico</label><br>
                        <input name="correo" type="email" class="form-control-lg w-100 " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa el correo electronico" value="<?php echo $correo_usuario; ?>">

                        <label for="exampleInputEmail1">Contraseña</label><br>
                        <input name="contrasenia" type="password" class="form-control-lg w-100 " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa la contraseña" value="<?php echo $contrasenia; ?>">
                    </div>
                    <div class="form-group">
                        <label for="rol">Rol</label>
                        <select name="rol" class="form-control form-control-lg w-100">
                            <?php
                            $query1 = mysqli_query($conexion, "SELECT id_rol,nombre_rol FROM rol 
                        where estado_rol=1");

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
                        <br>
                        <label for="estado">Estado</label>
                        <select name="estado" class="form-control form-control-lg w-100">
                            <option value="1">Activado</option>
                            <option value="2">Desactivado</option>
                        </select>
                    </div>

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

                    <a href="../gestionUsuarios/listarRoles.php" class="btn btn-primary btn-danger btn-lg w-100">Cancelar</a> <br><br>
                    <button type="submit" class="btn btn-primary btn-success btn-lg w-100">Editar</button>
                </form>

            </div>

        </div>
    </div>

</body>


</html>