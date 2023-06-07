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
    <?php
    include('../incluir/barraNav.php')
    ?>

    <div class="container my-5 text-center">
        <h1>Lista de Roles</h1>
        <br><br>
        <table class="table">
            <thead class="thead thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('../conexion.php');
                if($conexion->connect_error){
                    die("Coxion fallida: " . $conexion->connect_error);
                }

                $sql = "SELECT * FROM rol inner join estados on rol.estado_rol = estados.id_estado";
                $result = $conexion->query($sql);

                if(!$result){
                    die("Invalid query: " . $conexion->connect_error);
                }

                while($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>$row[id_rol]</td>
                        <td>$row[nombre_rol]</td>
                        <td>$row[estado_descripcion]</td>
                        
                        <td>";
            
                        if($row['estado_rol'] === '1'){
                            echo "<a class='btn btn-primary btn-warning btn-sm' href='./desactivar.php?id_rol=$row[id_rol]'>Desactivar</a>";
                        }
                        if($row['estado_rol'] === '2'){
                            echo "<a class='btn btn-primary btn-warning btn-sm' href='./activarRol.php?id_rol=$row[id_rol]'>Activar</a>";
                        }
            
                    echo "
                    <a class='btn btn-primary btn-info btn-sm' href='./editarRol.php?id_rol=$row[id_rol]'>Editar</a>
                        </td>
                    </tr>";
                }
                ?>
                
            </tbody>
        </table>
    </div>

</body>


</html>