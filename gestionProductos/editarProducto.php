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
</head>

<body>
    <?php
    include('../conexion.php');
    $nombre = '';
    $descripcion = '';
    $dataLogo = '';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM categorias WHERE id_categoria=$id";
        $result = mysqli_query($conexion, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $nombre = $row['nombre_categoria'];
            $descripcion = $row['descripcion_categoria'];
            $dataLogo = $row['logo_categoria'];
        }
    }

    if (isset($_POST['actualizar'])) {
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $dataLogo = $_POST['lgCat22'];

        $query = "UPDATE categorias set nombre_categoria = '$nombre', descripcion_categoria = '$descripcion',
        logo_categoria='$dataLogo' WHERE id_categoria=$id";
        mysqli_query($conexion, $query);

        header('Location: ./adminCategorias.php');
    }

    ?>
    <?php include('../incluir/barraNav.php'); ?>
    <center>
        <h1>Editar Categoria</h1>
        <div class="container p-4">
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <div class="card card-body">
                        <form action="editarCategoria.php?id=<?php echo $_GET['id']; ?>" method="POST">
                            <div class="form-group">
                                <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>"></input>
                            </div>
                            <div>
                                <div id="mostrarImgCat">
                                    <img id="imgEditarCat" width="50">
                                </div>
                                <script>
                                    var data = <?php echo json_encode($dataLogo); ?>;

                                    function dataURItoBlob(dataURI) {
                                        // convert base64/URLEncoded data component to raw binary data held in a string
                                        var byteString;

                                        if (dataURI.split(',')[0].indexOf('base64') >= 0)
                                            byteString = atob(dataURI.split(',')[1]);
                                        else
                                            byteString = unescape(dataURI.split(',')[1]);

                                        // separate out the mime component
                                        var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

                                        // write the bytes of the string to a typed array
                                        var ia = new Uint8Array(byteString.length);
                                        for (var i = 0; i < byteString.length; i++) {
                                            ia[i] = byteString.charCodeAt(i);
                                        }

                                        return new Blob([ia], {
                                            type: mimeString
                                        });
                                    }
                                    var dataURI = data;

                                    var blob = dataURItoBlob(dataURI);
                                    var objectURL = URL.createObjectURL(blob);

                                    imgEditarCat.src = objectURL;
                                </script>
                                <label>Logo de la Categoria</label>
                                <input type="file" accept="image/*" class="localCat22" id="logocat">
                                <input name="lgCat22" id="lgCat22" type="hidden">
                                <input type="button" onclick="ponerImagenDefecto()" value="Eliminar imagen">

                                <script>
                                    function ponerImagenDefecto() {
                                        let url = "../recursos/img/sinfoto.jpg"
                                        // ESTA FUNCION PERMITE CARGAR UNA FOTO POR DEFECTO 
                                        const toDataURL = url => fetch(url)
                                            .then(response => response.blob())
                                            .then(blob => new Promise((resolve, reject) => {
                                                const reader = new FileReader()
                                                //reader.onloadend = () => resolve(reader.result)
                                                reader.onloadend = () => {
                                                    const inpLogo = document.getElementById("lgCat22");
                                                    inpLogo.value = reader.result;
                                                    console.log('base64: ', reader.result);

                                                    // para mostrar la imagen en el img
                                                    // var data = json_encode(reader.result)
                                                    // var data = JSON.stringify(reader.result)
                                                    // var dataURI = data;

                                                    // var blob = dataURItoBlob(dataURI);
                                                    // var objectURL = URL.createObjectURL(blob);

                                                    //imgEditarCat.src = objectURL;
                                                    var x = document.getElementById("mostrarImgCat")
                                                    x.style.display = "none";
                                                }
                                                // reader.onerror = reject
                                                reader.readAsDataURL(blob)
                                            }))
                                        toDataURL(url);

                                    }

                                    const $file = document.querySelector(".localCat22");


                                    // ESTA FUNCION PERMITE DETECTAR CARGADO DE IMAGEN EN INPUT
                                    // Y CARGARLA
                                    $file.addEventListener("change", (event) => {
                                        const selectedfile = event.target.files;
                                        if (selectedfile.length > 0) {
                                            const [imageFile] = selectedfile;
                                            const fileReader = new FileReader();

                                            fileReader.readAsDataURL(imageFile);

                                            fileReader.onload = () => {
                                                const srcData = fileReader.result;
                                                //console.log('base64: ', srcData);
                                                inpLogo = document.getElementById("lgCat22");
                                                inpLogo.value = srcData;
                                                // // prueba para mostrar imagen en tiempo real

                                                // <?php $varLogo = "<script>srcData</script>" ?>

                                                // var data = <?php echo json_encode($varLogo); ?>;
                                                // console.log(data);
                                                // // para mostrar la imagen en el img
                                                // // var data = json_encode(srcData)
                                                // // var data = JSON.stringify(srcData)
                                                // var dataURI = data;

                                                // var blob = dataURItoBlob(dataURI);
                                                // var objectURL = URL.createObjectURL(blob);

                                                // imgEditarCat.src = objectURL;

                                                // console.log('exito enviando');
                                                var x = document.getElementById("mostrarImgCat")
                                                x.style.display = "none";
                                            };
                                        }
                                    })
                                </script>
                            </div>
                            <br>
                            <label>Descripción</label>
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
    </center>
    <?php //include('includes/footer.php'); 
    ?>
</body>

</html>