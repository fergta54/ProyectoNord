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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
    <div class="row">
        <div class="col-2">
            <?php include('../incluir/asideNavAdmin.php') ?>
        </div>
        <div class="col-10">
            <div class="container my-5 w-50">
                <h2 class="text-center">Editar Proveedor</h2>
                <form action="editarProveedor.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <label for="razon">Razon Social</label><br>
                        <input name="razon" type="text" class="form-control-lg w-100" id="razon" value="<?php echo $razonSocial; ?>"></input>
                        <label for="correo">Correo</label><br>
                        <input name="correo" type="text" class="form-control-lg w-100" id="correo" value="<?php echo $correo; ?>"></input>
                        <label for="telefono">Telefono</label><br>
                        <input name="telefono" type="text" class="form-control-lg w-100" id="telefono" value="<?php echo $telefono; ?>"></input>
                        <label for="direccion">Direccion</label><br>
                        <input name="direccion" type="text" class="form-control-lg w-100" id="direccion" value="<?php echo $direccion; ?>"></input>
                    </div>
                    <a href="./listarProveedores.php" class="btn btn-primary btn-danger btn-lg w-100">Cancelar</a> <br><br>
                    <button href="./adminProveedores.php" type="submit" class="btn btn-primary btn-success btn-lg w-100" name="actualizar">Actualizar datos</button>
                </form>  
            <?php 
            ?>
        </div>
    </div>
</body>

</html>