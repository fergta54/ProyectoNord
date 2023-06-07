<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROVEEDOR</title>
    <link rel="stylesheet" href="../recursos/css/index.css">
    <link rel="stylesheet" href="../recursos/css/cabecera.css">
    <link rel="stylesheet" href="../recursos/css/bootstrap.min.css">
    <script src="../recursos/js/bootstrap.min.js"></script>
    <script src="../recursos/js/jquery-3.7.0.min.js"></script>
</head>

<body>
    <?php
    include('../conexion.php');
    $razonSocial = '';
    $correo = '';
    $telefono = '';
    $direccion = '';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM proveedores WHERE id_proveedor =$id";
        $result = mysqli_query($conexion, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $razonSocial = $row['razonSocial_prov'];
            $correo = $row['correo_prov'];
            $telefono = $row['telf_prov'];
            $direccion = $row['direccion_prov'];
        }
    }

    if (isset($_POST['actualizar'])) {
        $id = $_GET['id'];
        $razonSocial = $_POST['razon'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];

        $query = "UPDATE proveedores set razonSocial_prov = '$razonSocial', correo_prov = '$correo',
        telf_prov='$telefono',direccion_prov='$direccion' WHERE id_proveedor=$id";
        mysqli_query($conexion, $query);

        header('Location: ./listarProveedores.php');
    }

    ?>
    <?php  include('../incluir/barraNavAdmin.php') ?>
    <center>
        <h1>EDITAR PROVEEDOR</h1>
        <div class="container p-4">
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <div class="card card-body">
                        <form action="editarProveedor.php?id=<?php echo $_GET['id']; ?>" method="POST">
                            <label>Razon Social</label>
                            <div class="form-group">
                                <input name="razon" type="text" class="form-control" value="<?php echo $razonSocial; ?>"></input>
                            </div>
                            <br>
                            <label>Correo</label>
                            <div class="form-group">
                                <input name="correo" type="text" class="form-control" value="<?php echo $correo; ?>"></input>
                            </div>
                            <br>
                            <label>Telefono</label>
                            <div class="form-group">
                                <input name="telefono" type="text" class="form-control" value="<?php echo $telefono; ?>"></input>
                            </div>
                            <br>
                            <label>Direccion</label>
                            <div class="form-group">
                                <input name="direccion" type="text" class="form-control" value="<?php echo $direccion; ?>"></input>
                            </div>
                            <br>
                                
                            <button class="btn-success" name="actualizar">
                                Actualizar datos
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </center>
    <?php //include('includes/footer.php'); 
    ?>
</body>

</html>