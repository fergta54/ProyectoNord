<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATEGORIAS</title>
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
    $nombre = '';
    $descripcion = '';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM marcas WHERE id_marca=$id";
        $result = mysqli_query($conexion, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $nombre = $row['nombre_marca'];
            $descripcion = $row['descripcion_marca'];
        }
    }

    if (isset($_POST['actualizar'])) {
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];

        $query = "UPDATE marcas set nombre_marca = '$nombre', descripcion_marca = '$descripcion' WHERE id_marca=$id";
        mysqli_query($conexion, $query);
        // $_SESSION['message'] = 'Task Updated Successfully';
        // $_SESSION['message_type'] = 'warning';
        echo "<script type='text/javascript'>alert('Los cambios en la marca han sido guardados');
        window.location = './adminMarcas.php';
        </script>";
    }

    ?>
    <div class="row">
        <div class="col-2">
            <?php include('../incluir/asideNavAdmin.php') ?>
        </div>
        <div class="col-10">
            <div class="container my-5 w-50">
                <h2 class="text-center">Editar Marca</h2>

                <form action="editarMarca.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <label for="nombreMarca">Nombre de la marca</label><br>
                        <input name="nombre" type="text" class="form-control-lg w-100" id="nombreMarca" value="<?php echo $nombre; ?>"></input>

                        <label for="descripcionMarca">Descripcion de la marca</label><br>
                        <textarea name="descripcion" class="form-control-lg w-100" id="descripcionMarca" cols="30" rows="10"><?php echo $descripcion; ?></textarea>
                    </div>

                    <a href="./adminMarcas.php" class="btn btn-primary btn-danger btn-lg w-100">Cancelar</a> <br><br>
                    <button type="submit" class="btn btn-primary btn-success btn-lg w-100" name="actualizar">Actualizar datos</button>

                </form>
            </div>
        </div>
    </div>

    <?php //include('includes/footer.php'); 
    ?>

</body>

</html>