<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROVEEDORES</title>
    <link rel="stylesheet" href="../recursos/css/index.css">
    <link rel="stylesheet" href="../recursos/css/bootstrap.min.css">
    <script src="../recursos/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../recursos/css/cabecera.css">
    <script src="../recursos/js/jquery-3.7.0.min.js"></script>
    <script src="../recursos/js/botonMostrar.js"></script>
    <style>
        .container {
            overflow-x: auto;
            padding: 0;
        }

        .tablaProveedores {
            width: 100%;
            white-space: nowrap;
        }

        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-2">
            <?php include('../incluir/asideNavAdmin.php') ?>
        </div>
        <div class="col-10">
            <div class="container my-5 text-center">
                <h1>Lista de Proveedores</h1>
                <br><br>
                <div class="table-responsive">
                    <table class="tablaMarcas table table-bordered">
                            <thead class="thead thead-dark">
                                <tr>
                                <th class="td1">Nro</th>
                                <th class="td2">Razon Social</th>
                                <th class="td3">Correo</th>
                                <th class="td4">Telefono</th>
                                <th class="td4">Direccion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include('../conexion.php');
                            if (!$conexion) {
                                echo "Error en la conexion";
                            } else {
                                //session_start();
                                $ejecutarConsulta = mysqli_query(
                                    $conexion,
                                    "SELECT id_proveedor as Nro,razonSocial_prov as Razon, correo_prov as Correo,
                            telf_prov as Telefono,direccion_prov as Direccion,estado_prov  as Estado 
                            FROM proveedores where estado_prov=1 order by id_proveedor"
                                )
                                    or die("Problemas en la inserción" . mysqli_error($conexion));
                                //echo $_SESSION['IdRegistro'];
                                // mysqli_close($conexion);
                                $verFilas = mysqli_num_rows($ejecutarConsulta);
                                $fila = mysqli_fetch_array($ejecutarConsulta);
                                if (!$ejecutarConsulta) {
                                    echo "Error en la consulta";
                                } else {

                                    if ($verFilas < 1) {
                                        echo "<tr><td colspan='6'>SIN REGISTROS</td></tr>";
                                    } else {
                                        for ($i = 0; $i < $verFilas; $i++) {
                                            echo '
                                    <tr>
                                        <td>' . ($i + 1) . '</td>
                                        <td>' . $fila[1] . '</td>
                                        <td>' . $fila[2] . '</td>
                                        <td>' . $fila[3] . '</td>
                                        <td>' . $fila[4] . '</td>
                                    </tr>';
                                            $fila = mysqli_fetch_array($ejecutarConsulta);
                                        }
                                    }
                                }
                            }

                            ?>


                        </tbody>
                    </table>
                </div>

                <br><br>
            </div>
        </div>
    </div>
</body>

</html>
