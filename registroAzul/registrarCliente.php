<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO</title>
    <link rel="stylesheet" href="../recursos/css/index.css">
    <link rel="stylesheet" href="../recursos/css/bootstrap.min.css">
    <script src="../recursos/js/bootstrap.min.js"></script>
    <script src="../recursos/js/jquery-3.7.0.min.js"></script>
</head>

<body>
    <center>
        <h1>REGISTRO DE CLIENTES</h1><br>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="jumbotron">
                        <p classs="lead text-center">Registrate para obtener todos nuestros beneficios</p>
                        <hr class="my-4">
                        <div class="section-center">
                            <div class="container">
                                <div class="row">
                                    <form action="./crearCliente.php" method="post">
                                        <div class="row">
                                            <div>
                                                <label>Nombre</label>
                                                <input name="nombrecli" class="form-control" id="nombrecli" type="text" required>
                                                <label>Apellido</label>
                                                <input name="apellidocli" class="form-control" id="apellidocli" type="text" required>
                                                <label>Correo</label>
                                                <input name="correocli" class="form-control" id="correocli" type="email" required>
                                                <label>Direccion</label>
                                                <input name="direccioncli" class="form-control" id="direccioncli" type="text" required>
                                                <label>Telefono</label>
                                                <input name="telefonocli" class="form-control" id="telefonocli" type="text" required>
                                                <label>Contraseña</label>
                                                <input name="contraseniacli" class="form-control" id="contraseniacli" type="password" required>
                                                <br>       
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
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-btn">
                                                    <button class="submit-btn">REGISTRATE</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <?php
        include("../conexion.php");
        if (!$conexion) {
            echo "Error en la conexion";
        } else {
            $consulta = mysqli_query($conexion, "SELECT COUNT(*) FROM  marcas")
                or die("Problemas en la inserción" . mysqli_error($conexion));
            $totalRegistros = mysqli_fetch_array($consulta);
            echo "Cantidad de pasajeros en Objeto JSON: " . json_encode($totalRegistros);
            //echo "<script type='text/javascript'>alert(".json_encode($totalRegistros).");</script>";
        }
        ?>
    </center>
</body>

</html>