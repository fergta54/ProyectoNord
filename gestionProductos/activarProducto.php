<?php
include('../conexion.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // $query = "SELECT * FROM marcas WHERE id_marca=$id";
    // $result = mysqli_query($conexion, $query);
    // if (mysqli_num_rows($result) == 1) {
    //     $row = mysqli_fetch_array($result);
    //     $nombre = $row['nombre_marca'];
    //     $descripcion = $row['descripcion_marca'];
    // }
    $query2 = "UPDATE productos set estado_producto = 1 WHERE id_prod=$id";
    mysqli_query($conexion, $query2);

    echo "<script type='text/javascript'>alert('El producto ha sido habilitado');
    window.location = './adminProductos.php';
    </script>";
}

// if (isset($_POST['actualizar'])) {
//     $id = $_GET['id'];
//     $nombre = $_POST['nombre'];
//     $descripcion = $_POST['descripcion'];

//     $query = "UPDATE marcas set nombre_marca = '$nombre', descripcion_marca = '$descripcion' WHERE id_marca=$id";
//     mysqli_query($conexion, $query);
//     $_SESSION['message'] = 'Task Updated Successfully';
//     $_SESSION['message_type'] = 'warning';
//     header('Location: ./adminMarcas.php');
// }

?>
<?php include('../incluir/barraNavAdmin.php'); ?>
<!-- <center>
    <h1>Editar Marca</h1>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="editarMarca.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <div class="form-group">
                            <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>"></input>
                        </div>
                        <div class="form-group">
                            <textarea name="descripcion" class="form-control" cols="30" rows="10"><?php echo $descripcion; ?></textarea>
                        </div>
                        <button class="btn-success" name="actualizar">
                            Actualizar datos
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</center> -->
<?php //include('includes/footer.php'); 
?>