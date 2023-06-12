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
    
</head>

<body>
    <div class="row">
        <div class="col-2">
        <?php include('../incluir/asideNavAdmin.php') ?>
            </div>
            <div class="col-10">

            <div class="container my-5 text-center">
        <h1>Editar Usuarios</h1>
        <br><br>
        <table class="table">
            <thead class="thead thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Correo</th>
                    <th>Contraseña</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('../conexion.php');
                if($conexion->connect_error){
                    die("Coxion fallida: " . $conexion->connect_error);
                }

                $sql = "SELECT * FROM usuarios inner join estados on usuarios.estado_usuario = estados.id_estado inner join rol on usuarios.id_rol = rol.id_rol order by estado_rol";
                $result = $conexion->query($sql);

                if(!$result){
                    die("Invalid query: " . $conexion->connect_error);
                }

                while($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>$row[id_usuario]</td>
                        <td>$row[nombre_completo]</td>
                        <td>$row[nombre_usuario]</td>
                        <td>$row[correo_usuario]</td>
                        <td>$row[contrasenia]</td>
                        <td>$row[nombre_rol]</td>
                        <td>$row[estado_descripcion]</td>
                        
                        <td>
                            <a class='btn btn-primary btn-info btn-sm' href='./editarUsuarios.php?id_usuario=$row[id_usuario]'>Editar</a>
                        </td>
                    </tr>";
                }
                ?>
                
            </tbody>
        </table>
    </div>

            </div>
    </div>
    

    

</body>


</html>