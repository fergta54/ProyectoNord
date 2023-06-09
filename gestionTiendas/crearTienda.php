<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIENDAS</title>
    <link rel="stylesheet" href="../recursos/css/index.css">
    <link rel="stylesheet" href="../recursos/css/bootstrap.min.css">
    <script src="../recursos/js/bootstrap.min.js"></script>
    <script src="../recursos/js/jquery-3.7.0.min.js"></script>
</head>

<body>
    <div class="row">
        <div class="col-2">
            <?php include('../incluir/asideNavAdmin.php') ?>
        </div>
        <div class="col-10">
            <div class="container my-5 w-50">

                <h2 class="text-center">Registrar una tienda</h2>

                <p classs="lead text-center">Inserta todos los datos para registrar una tienda</p>
                <hr class="my-4">


                <form action="./registrarTienda.php" method="post">
                    <div class="form-group">

                        <label for="nombreTienda">Nombre de Tienda</label><br>
                        <input name="nombreTienda" class="form-control-lg w-100" id="nombreTienda" type="text" required>
                        <label for="direccionTienda">Dirección de la Tienda</label><br>
                        <textarea name="direccionTienda" class="form-control-lg w-100" id="direccionTienda" required></textarea>
                        <br>
                        <label for="latitudTienda">Latitud de la Tienda</label><br>
                        <input name="latitudTienda" class="form-control-lg w-100" id="latitudTienda" type="number" step="any" required>
                        <br>
                        <label for="longitudTienda">Longitud de la Tienda</label><br>
                        <input name="longitudTienda" class="form-control-lg w-100" id="longitudTienda" type="number" step="any" required>
                        <br>
                        <label for="fototiend">Foto de la Tienda</label><br>
                        <input type="file" accept="image/*" class="fotoTienda" id="fototiend" name="fototiend">
                        <input name="lgTiend" id="lgTiend" type="hidden">
                        <script>
                            const $file = document.querySelector(".fotoTienda");
                            let url = "../recursos/img/sinfoto.jpg"
                            // ESTA FUNCION PERMITE CARGAR UNA FOTO POR DEFECTO 
                            const toDataURL = url => fetch(url)
                                .then(response => response.blob())
                                .then(blob => new Promise((resolve, reject) => {
                                    const reader = new FileReader()
                                    //reader.onloadend = () => resolve(reader.result)
                                    reader.onloadend = () => {
                                        const inpLogo = document.getElementById("lgTiend");
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
                                        inpLogo = document.getElementById("lgTiend");
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

                    <br>
                    <a href="./adminTiendas.php" class="btn btn-primary btn-danger btn-lg w-100">Cancelar</a> <br><br>
                    <button type="submit" class="btn btn-primary btn-success btn-lg w-100">Registrar</button>
                </form>

            </div>
        </div>
    </div>


</body>

</html>