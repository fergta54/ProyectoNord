<?php
if (isset($_GET['id']) && isset($_POST['botonOcultoEliminar'])) {
    include('../conexion.php');
    $id = $_GET['id'];
    $query2 = "UPDATE categorias set estado_categoria = 2 WHERE id_categoria=$id";
    mysqli_query($conexion, $query2);

    echo "<script type='text/javascript'>alert('La categoría ha sido desactivada');
    window.location = './adminCategorias.php';
    </script>";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../recursos/js/jquery-3.7.0.min.js"></script>
</head>

<body>
    <form action="eliminarCategoria.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <button type="submit" id="botonOcultoEliminar" name="botonOcultoEliminar" hidden></button>
    </form>
</body>

</html>
<script>
    if (verificarEliminacion()) {
        document.getElementById("botonOcultoEliminar").click();
    } else {
        alert("La categoria sigue activa");
        window.location = './adminCategorias.php'
    }

    function verificarEliminacion() {
        let texto = "¿Está seguro de desactivar la categoria?";
        if (confirm(texto) == true) {
            return true;
        } else {
            return false;
        }
    }
</script>