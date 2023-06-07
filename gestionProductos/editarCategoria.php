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

    $query = "UPDATE categorias set nombre_categoria = '$nombre', descripcion_categoria = '$descripcion' WHERE id_categoria=$id";
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
                    <form action="editarMarca.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <div class="form-group">
                            <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>"></input>
                        </div>
                        <div>
                            <img id="logo<?php echo $i ?>" width="50">
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

                                logo<?php echo $i ?>.src = objectURL;
                            </script>
                            <label>Logo de la Categoria</label>
                            <input type="file" accept="image/*" class="localCat" id="logocat">
                            <input name="lgCat" id="lgCat" type="hidden">

                            <script>
                                const $file = document.querySelector(".localCat");
                                let url = "../recursos/img/sinfoto.jpg"
                                // ESTA FUNCION PERMITE CARGAR UNA FOTO POR DEFECTO 
                                const toDataURL = url => fetch(url)
                                    .then(response => response.blob())
                                    .then(blob => new Promise((resolve, reject) => {
                                        const reader = new FileReader()
                                        //reader.onloadend = () => resolve(reader.result)
                                        reader.onloadend = () => {
                                            const inpLogo = document.getElementById("lgCat");
                                            inpLogo.value = reader.result;
                                        }

                                        reader.onerror = reject
                                        reader.readAsDataURL(blob)
                                    }))
                                toDataURL(url);

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
                                            console.log('base64: ', srcData);
                                            inpLogo = document.getElementById("lgCat");
                                            inpLogo.value = srcData;

                                            // $.post('gestionProductos/registrarCategoria.php', {
                                            //     variableLogo: srcData
                                            // });
                                            console.log('exito enviando');
                                        };
                                    }
                                })
                            </script>
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
</center>
<?php //include('includes/footer.php'); 
?>