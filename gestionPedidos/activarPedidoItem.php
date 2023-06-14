<?php
include('../conexion.php');

if (isset($_GET['item_linea_id_pedido'])) {
    $item_linea_id_pedido = $_GET['item_linea_id_pedido'];
    $query2 = "UPDATE pedidos_items set estado_compra = 1 WHERE item_linea_id_pedido=$item_linea_id_pedido";
    mysqli_query($conexion, $query2);
    $_SESSION['message'] = 'Task Updated Successfully';
    $_SESSION['message_type'] = 'warning';
    header('Location: ./adminPedidosItem.php');
}


?>
<?php include('../incluir/barraNav.php'); ?>
<!-- <center>
    <h1>Editar Marca</h1>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="editarMarca.php?id=<?php echo $_GET['item_linea_id_pedido']; ?>" method="POST">
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