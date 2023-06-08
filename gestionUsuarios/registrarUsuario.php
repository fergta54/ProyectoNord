
<?php
    include('../conexion.php');

    $nombreUsuario = "";
    $usuarioUsuario = "";
    $correoUsuario = "";
    $contraseniaUsuario = "";
    $rolUsuario = "";
    $estadoUsuario = 0;

    $errorMessage = "";
    $successMessage = "";

    if( $_SERVER['REQUEST_METHOD'] == 'POST') {
        

        $nombreUsuario = $_POST["nombre"];
        $usuarioUsuario = $_POST["usuario"];
        $correoUsuario = $_POST["correo"];
        $contraseniaUsuario = $_POST["contrasenia"];
        $rolUsuario = $_POST["rol"];
        $estadoUsuario = $_POST["estado"];

        do {
            if (empty($nombreUsuario) || empty($usuarioUsuario) || empty($correoUsuario) || empty($contraseniaUsuario) || empty($rolUsuario) || empty($estadoUsuario)){
                $errorMessage = "Todos los campos deben ser llenados";
                break;
            }

            //insertar un nuevo rol en la base de datos
            $sql = "INSERT INTO usuarios(nombre_completo, nombre_usuario, correo_usuario, contrasenia, id_rol, estado_usuario) 
            VALUES('$nombreUsuario', '$usuarioUsuario', '$correoUsuario', MD5('$contraseniaUsuario'), '$rolUsuario', '$estadoUsuario')";
            $result = $conexion->query($sql);
            
            if(!$result) {
                $errorMessage = "Invalid query: " . $conexion->error;
                break;
            }

            $nombreUsuario = "";
            $usuarioUsuario = "";
            $correoUsuario = "";
            $contraseniaUsuario = "";
            $rolUsuario = "";
            $estadoUsuario = 0;

            $successMessage = "Usuario añadido correctamente";

            header("location: ./listarUsuarios.php");
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
    <title>Registro de Usuarios</title>
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
            <div class="form-group ">
                <label for="exampleInputEmail1">Nombre Completo</label><br>
                <input name="nombre" type="text" class="form-control-lg w-100 " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa el nombre del usuario" value="<?php echo $nombreUsuario; ?>">
                
                <label for="exampleInputEmail1">Nombre de Usuario</label><br>
                <input name="usuario" type="text" class="form-control-lg w-100 " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa el usuario" value="<?php echo $usuarioUsuario; ?>">
                
                <label for="exampleInputEmail1">Correo Electronico</label><br>
                <input name="correo" type="email" class="form-control-lg w-100 " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa el correo electronico" value="<?php echo $correoUsuario; ?>">
                
                <label for="exampleInputEmail1">Contraseña</label><br>
                <input name="contrasenia" type="password" class="form-control-lg w-100 " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa la contraseña" value="<?php echo $contraseniaUsuario; ?>">
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

        </div>
    </div>
    
</body>


</html>