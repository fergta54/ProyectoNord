<?php
header("Content-type: application/xls");
header("Content-Disposition: attachment; filename = ReporteUsuarios.xls");
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <script src="../recursos/js/bootstrap.min.js"></script>
    <script src="../recursos/js/jquery-3.7.0.min.js"></script>
    
</head>

<body>
<div class="container my-5 text-center">
        <h1>Lista de Usuarios</h1>
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
                </tr>
            </thead>
            <tbody>
                <?php
                include('../../conexion.php');
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
                        
                    </tr>
                    ";
                }
                ?>
                
            </tbody>
        </table>
    </div>
    

    

</body>


</html>