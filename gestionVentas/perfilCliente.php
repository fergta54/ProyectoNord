<?php
session_start();
include("../conexion.php");

$id_cliente = $_SESSION['id_cliente'];

$nombre = '';
$apellido = '';
$correo = '';
$direccion = '';
$contrasenia = '';
$telefono = '';
$dataLogo = '';


if (isset($_POST['actualizar'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $contrasenia = $_POST['contrasenia'];
    $telefono = $_POST['telefono'];
    $dataLogo = $_POST['lgcli'];


    $query = "UPDATE clientes SET nombre_cli = '$nombre', apellido_cli = '$apellido', correo_cli = '$correo',
     direccion_cli = '$contrasenia', contrasenia_cli = '$direccion',telf_cli = '$telefono',foto_cli = '$dataLogo'  WHERE id_cliente = $id_cliente";
    mysqli_query($conexion, $query);

    header('Location: ./perfilCliente.php');
}

$query = "SELECT * FROM clientes WHERE id_cliente = $id_cliente";
$result = mysqli_query($conexion, $query);
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre_cli'];
    $apellido = $row['apellido_cli'];
    $correo = $row['correo_cli'];
    $direccion = $row['direccion_cli'];
    $telefono = $row['telf_cli'];
    $contrasenia = $row['contrasenia_cli'];
    $dataLogo = $row['foto_cli'];
}
if (isset($_POST['guardar_imagen'])) {
    $dataLogo = $_POST['lgcli'];


    $query = "UPDATE clientes SET foto_cli = '$dataLogo'  WHERE id_cliente = $id_cliente";
    mysqli_query($conexion, $query);

    header('Location: ./perfilCliente.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../recursos/css/ventas.css">
    <link rel="stylesheet" href="../recursos/css/cabecera.css">
    <link rel="stylesheet" href="../recursos/css/index.css">
    <link rel="stylesheet" href="../recursos/css/bootstrap.min.css">
    <script src="../recursos/js/bootstrap.min.js"></script>
    <!-- Font Awesome carrito -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .outer-box {
            background-color: white;
            padding: 20px;
            width: 70%;
            height: 300px;
            margin: 0 auto;
            border: 2px solid #080808;
            border-radius: 5px;
        }

        .inner-box {
            display: flex;
        }

        .left-box {
            background-color: white;
            padding: 10px;
            border: 2px solid #080808;
            border-radius: 5px;
            width: 65%;

        }

        .right-box {
            background-color: white;
            padding: 10px;
            border: 2px solid #080808;
            border-radius: 5px;
            margin-left: 2%;
            width: 30%;
            align-items: center;
            flex-direction: column;
            justify-content: center;
        }


        .form-container {
            display: flex;
            justify-content: center;
        }

        .form-wrapper {
            width: 80%;
            margin: 0 auto;
        }

        .form-wrapper input[type="text"],
        .form-wrapper input[type="email"],
        .form-wrapper input[type="tel"],
        .form-wrapper input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-wrapper input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #080808;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-wrapper input[type="submit"]:hover {
            background-color: #333333;
        }
    </style>
</head>

<body>

    <?php include('../incluir/navVentas.php'); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Perfil de usuario</h1>
                <div class="outer-box">
                    <div class="inner-box">
                        <div class="left-box">
                            <form class="form-container" action="" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="nombre">Nombre:</label>
                                        <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required class="w-100" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="apellido">Apellido:</label>
                                        <input type="text" id="apellido" name="apellido" value="<?php echo $apellido; ?>" required class="w-100" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="correo">Correo:</label>
                                        <input type="email" id="correo" name="correo" value="<?php echo $correo; ?>" required class="w-100" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="direccion">Direccion:</label>
                                        <input type="text" id="direccion" name="direccion" value="<?php echo $direccion; ?>" required class="w-100" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="telefono">Telefono:</label>
                                        <input type="number" id="telefono" name="telefono" value="<?php echo $telefono; ?>" required class="w-100" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="contrasenia">Contraseña:</label>
                                        <input type="password" id="contrasenia" name="contrasenia" value="<?php echo $contrasenia; ?>" required class="w-100" disabled>
                                    </div>
                                    <br>
                                    <br>
                                    <br>

                                    <div class="col-md-6">
                                        <div class="form-wrapper">
                                            <style>
                                                .edit-button {
                                                    display: inline-block;
                                                    width: 100%;
                                                    padding: 10px;
                                                    background-color: #080808;
                                                    color: white;
                                                    border: none;
                                                    border-radius: 5px;
                                                    cursor: pointer;
                                                    text-decoration: none;
                                                    text-align: center;
                                                }

                                                .edit-button:hover {
                                                    background-color: #333333;
                                                }
                                            </style>


                                            <a class="w-100 edit-button" onclick="habilitarEdicion()" style="color:#FFFF">EDITAR</a>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-6">
                                        <div class="form-wrapper">
                                            <input type="submit" name="actualizar" value="GUARDAR" class="w-100">
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="right-box">
                            <form action="" method="POST" enctype="multipart/form-data">

                                <div>
                                    <div id="mostrarImgCat">
                                        <img id="imgEditarCat" width="200" height="150">
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
                                    <input type="file" accept="image/*" class="localCat22" id="logocat">
                                    <input name="lgcli" id="lgcli" type="hidden" value="<?php echo $dataLogo; ?>">

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
                                                        const inpLogo = document.getElementById("lgcli");
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
                                                    inpLogo = document.getElementById("lgcli");
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

                                <div class="form-wrapper">
                                    <input type="submit" name="guardar_imagen" value="Guardar Imagen">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        function habilitarEdicion() {
            // Habilitar los campos de entrada de texto
            document.getElementById('nombre').disabled = false;
            document.getElementById('correo').disabled = false;
            document.getElementById('telefono').disabled = false;
            document.getElementById('apellido').disabled = false;
            document.getElementById('direccion').disabled = false;
            document.getElementById('contrasenia').disabled = false;
            document.getElementById('contrasenia').type = "text";

        }
    </script>
    <script src="../recursos/js/bootstrap.bundle.min.js"></script>


</body>
    <?php include('../incluir/footer.php'); ?>
<?php include('../incluir/footer.php'); ?>

</html>