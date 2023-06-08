<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATEGORIAS</title>
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

                <h2 class="text-center">Registrar una categoria</h2>

                <p classs="lead text-center">Inserta todos los datos para registrar una categoria</p>
                <hr class="my-4">


                <form action="./registrarCategoria.php" method="post">
                    <div class="form-group">

                        <label for="nombreCategoria">Nombre de Categoria</label><br>
                        <input name="nombreCategoria" class="form-control-lg w-100" id="nombreCategoria" type="text" required>
                        <label>Descripción de la Categoria</label><br>
                        <textarea name="descripcionCategoria" class="form-control-lg w-100" id="descripcionCategoria" required></textarea>
                        <br>
                        <label for="logocat">Logo de la Categoria</label><br>
                        <input type="file" accept="image/*" class="localCat" id="logocat" name="logocat">
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

                    <br>
                    <a href="./adminCategorias.php" class="btn btn-primary btn-danger btn-lg w-100">Cancelar</a> <br><br>
                    <button type="submit" class="btn btn-primary btn-success btn-lg w-100">Registrar</button>
                </form>

            </div>
        </div>
    </div>


</body>

</html>