<?php
header("Content-type: application/xls");
header("Content-Disposition: attachment; filename = ReporteInventario.xls");
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Roles</title>
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
                    <th>Tienda</th>
                    <th>Producto</th>
                    <th>Stock</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                include('../../conexion.php');
                if($conexion->connect_error){
                    die("Coxion fallida: " . $conexion->connect_error);
                }

                
                $sql = "SELECT * FROM inventarios inner join tiendas on inventarios.id_tienda = tiendas.id_tienda inner join productos on inventarios.id_producto = productos.id_prod";

                $result = $conexion->query($sql);

                if(!$result){
                    die("Invalid query: " . $conexion->connect_error);
                }

                while($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>$row[id_inventario]</td>
                        <td>$row[nombre_tienda]</td>
                        <td>$row[nombre_prod]</td>
                        <td>$row[stock_inventario]</td>
                        
                        
                        
                    </tr>";
                }
                ?>
                
            </tbody>
        </table>
    </div>

    

    

</body>


</html>