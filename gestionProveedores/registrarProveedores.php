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
    <script src="../recursos/js/jquery-3.7.0.min.js"></script>
</head>

<body>
    <div class="row">
        <div class="col-2">
            <?php include('../incluir/asideNavAdmin.php');?>
        </div>
        <div class="col-10">
            <?php include('../conexion.php');?>
            <div class="container my-5 w-50">
                <h2 class="text-center">Registro de Proveedor</h2>
                <p classs="lead text-center">Registra los nuevos proveedores de la empresa</p>
                <hr class="my-4">
                <form action="./crearProveedor.php" method="post">
                    <div class="form-group">
                        <label for="razonsocialProveedor">Razon Social</label><br>
                        <input name="razonsocialProveedor" class="form-control-lg w-100" id="razonsocialProveedor" type="text" required>
                        <br><br>
                        <label for="correoProveedor">Correo</label><br>
                        <input name="correoProveedor" class="form-control-lg w-100" id="correoProveedor" type="email" required>
                        <br><br>
                        <label for="razonsocialProveedor">Razon Social</label><br>
                        <input name="razonsocialProveedor" class="form-control-lg w-100" id="razonsocialProveedor" type="text" required>
                        <br><br>
                        <label for="telefonoProveedor">Telefono</label><br>
                        <input name="telefonoProveedor" class="form-control-lg w-100" id="telefonoProveedor" type="text" required>
                        <br><br>
                        <label for="direccionProveedor">Direccion</label><br>
                        <input name="direccionProveedor" class="form-control-lg w-100" id="direccionProveedor" type="`dirrection`" required>
                        <br><br>
                        <br>
                        <a href="./listarProveedores.php" class="btn btn-primary btn-danger btn-lg w-100">Cancelar</a> <br><br>
                        <button type="submit" class="btn btn-primary btn-success btn-lg w-100">Registrar Proveedores</button>
                    </div>
                </form>                            
            </div>
        </div>
    </div>
</body>
</html>