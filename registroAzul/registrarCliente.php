<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="../recursos/css/login.css">
    <link rel="stylesheet" href="../recursos/css/cabecera.css">
</head>

<body>
    <form action="./crearCliente.php" method="post">
        <h1>REGISTRO DE CLIENTES</h1>
        <div class="form-group">
            <label for="nombrecli">Nombre</label><br>
            <input name="nombrecli" class="form-control-lg w-100" id="nombrecli" type="text" required>
            <br><br>
            <label for="apellidocli">Apellido</label><br>
            <input name="apellidocli" class="form-control-lg w-100" id="apellidocli" type="text" required>
            <br><br>
            <label for="correocli">Correo</label><br>
            <input name="correocli" class="form-control-lg w-100" id="correocli" type="text" required>
            <br><br>
            <label for="direccioncli">Direccion</label><br>
            <input name="direccioncli" class="form-control-lg w-100" id="direccioncli" type="text" required>
            <br><br>
            <label for="telefonocli">Telefono</label><br>
            <input name="telefonocli" class="form-control-lg w-100" id="telefonocli" type="text" required>
            <br><br>
            <label for="contraseniacli">Contraseña</label><br>
            <input name="contraseniacli" class="form-control-lg w-100" id="contraseniacli" type="text" required>
            <br><br>                                     
                <label>Foto de Perfil</label>
                <input type="file" accept="image/*" class="localCat" id="lgcli">
                <input name="lgcli" id="lgcli" type="hidden">
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
                                const inpLogo = document.getElementById("lgcli");
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
                                inpLogo = document.getElementById("lgcli");
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
            <input type="submit" value="REGISTRATE"></input>
    </form>
</body>
</html>
