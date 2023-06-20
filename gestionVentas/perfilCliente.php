<?php
session_start();
include("../conexion.php");

$id_cliente = $_SESSION['id_cliente'];

// Consulta para obtener los datos del cliente
$consultaCliente = "SELECT * FROM clientes WHERE id_cliente = '$id_cliente'";
$resultadoCliente = mysqli_query($conexion, $consultaCliente);
$datosCliente = mysqli_fetch_assoc($resultadoCliente);

// Asignar los datos del cliente a variables individuales
$nombre = $datosCliente['nombre_cli'];
$correo = $datosCliente['correo_cli'];
$telefono = $datosCliente['telf_cli'];
$apellido = $datosCliente['apellido_cli'];
$direccion = $datosCliente['direccion_cli'];
$contrasenia = $datosCliente['contrasenia_cli'];

mysqli_free_result($resultadoCliente);
mysqli_close($conexion);
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

    <style>
        .outer-box {
            background-color: white;
            padding: 20px;
            width: 70%;
            height: 400px;
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
            margin-left: 1%;
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
            width: 600px;
            border: 1px solid #ccc;
            padding: 20px;
            display: flex;
        }

        .form-left {
            flex: 1;
            margin-right: 20px;
        }

        .form-right {
            flex: 1;
        }

        .form-field {
            margin-bottom: 10px;
        }

        .form-field label {
            display: block;
            font-weight: bold;
        }

        .form-field input {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-button {
            margin-top: 20px;
        }

        .form-button button {
            margin-right: 10px;
        }

        .titu {
            text-align: center;
        }

        @media (max-width: 768px) {
            .form-wrapper {
                flex-direction: column;
            }

            .form-left,
            .form-right {
                margin-right: 0;
                margin-bottom: 20px;
            }
        }

        .square {
            width: 200px;
            height: 200px;
            background-color: black;
            margin-bottom: 10px;

        }

        .btn-subir-foto,
        .btn-eliminar-foto {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <?php include('navVentas.php'); ?>

    <h1>PERFIL DE USUARIO</h1>

    <div class="outer-box">
        <div class="inner-box">
            <div class="left-box">
                <div class="form-container">
                    <div class="form-wrapper">
                        <div class="form-left">
                            <div class="form-field">
                                <label for="nombre">Nombre:</label>
                                <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" disabled />
                            </div>
                            <div class="form-field">
                                <label for="correo">Correo Electrónico:</label>
                                <input type="email" id="correo" name="correo" value="<?php echo $correo; ?>" disabled />
                            </div>
                            <div class="form-field">
                                <label for="ciudad">Telefono:</label>
                                <input type="text" id="telefono" name="telefono" value="<?php echo $telefono; ?>" disabled />
                            </div>
                            <div class="form-button">
                            <script>
                                function habilitarEdicion() {
                                    // Habilitar los campos de entrada de texto
                                    document.getElementById('nombre').disabled = false;
                                    document.getElementById('correo').disabled = false;
                                    document.getElementById('telefono').disabled = false;
                                    document.getElementById('apellido').disabled = false;
                                    document.getElementById('direccion').disabled = false;
                                    document.getElementById('contrasenia').disabled = false;
                                }
                            </script>
                                <button type="button" id="btn-editar" onclick="habilitarEdicion()">Editar</button>
                            </div>
                        </div>
                        <div class="form-right">
                            <div class="form-field">
                                <label for="apellido">Apellido:</label>
                                <input type="text" id="apellido" name="apellido" value="<?php echo $apellido; ?>" disabled />
                            </div>
                            <div class="form-field">
                                <label for="celular">Direccion:</label>
                                <input type="text" id="direccion" name="direccion" value="<?php echo $direccion; ?>" disabled />
                            </div>
                            <div class="form-field">
                                <label for="zona">Contraseña:</label>
                                <input type="password" id="contrasenia" name="contrasenia" value="<?php echo $contrasenia; ?>" disabled />
                            </div>
                            <div class="form-button">
                            <button type="submit" id="btn-guardar" onclick="guardarCambios()">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-box">
                <div class="overlay-box"></div>
                <div class="overlay-box2">
                    <div class="right-box-content">
                        <div class="square"></div>
                        <button class="btn-subir-foto">Subir foto</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('../incluir/footer.php'); ?>
</body>

</html>
