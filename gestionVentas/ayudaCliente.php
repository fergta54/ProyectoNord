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
        .containerrr {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 400px;
            width: 350px;
            background-color: white;
            border: 1px solid black;
            padding: 20px;
            margin-left: 500px;

            
        }

        .inner-boxxx {
            width: 300px;
            height: 350px;
            background-color: #008db1;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .titleee {
            font-size: 18px;
            font-weight: bold;
            
        }

        .cuadro {
            width: 300px;
            height: 300px;
            border: 1px solid #ccc;
            padding: 10px;
            overflow-y: auto;
            
        }

        .conversacion {
            margin-bottom: 10px;
            
        }

        .mensaje {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin-bottom: 5px;
            
        }

        .mensaje.bot {
            justify-content: flex-end;
        }

        .mensaje.bot p,
        .mensaje.usuario p {
            background-color: #f2f2f2;
            padding: 10px;
            color: #333;
        }

        .mensaje.bot p {
            border-radius: 10px 10px 0 10px;
            margin-right: 10px;
            background-color: #f2f2f2;

        }

        .mensaje.usuario p {
            border-radius: 10px 10px 10px 0;
            margin-left: 10px;
            background-color: #f2f2f2;

        }
        .opcion {
        border-bottom: 1px solid black;
    }
    </style>
</head>

<body>
    <?php include('navVentas.php'); ?>

    <h1>AYUDA AL CLIENTE</h1>

    <div>
        <div class="containerrr">
            <h1 class="titleee">Chat de preguntas</h1>
            <div class="inner-boxxx">
                <div class="cuadro">
                    <!-- Cuadro de conversación -->
                    <div class="conversacion" id="conversacion">
                        <div class="mensaje bot">
                            <p>Bienvenido al chat bot. ¿En qué puedo ayudarte?</p>
                        </div>
                    </div>

                    <!-- Cuadro de preguntas -->
                    <div class="preguntas">
                    <div class="opcion" onclick="handleClick('horario')" style="background-color: #f2f2f2; color:black;" >
                        ¿Cuál es el horario de atención?
                    </div>
                    <div class="opcion" onclick="handleClick('descuento')" style="background-color: #f2f2f2;color:black;">
                        ¿Tienen algún descuento o promoción vigente?
                    </div>
                    <div class="opcion" onclick="handleClick('entrega')" style="background-color: #f2f2f2;color:black;">
                        ¿Cuál es el tiempo estimado de entrega?
                    </div>
                    <div class="opcion" onclick="handleClick('pago')" style="background-color: #f2f2f2;color:black;">
                        ¿Cuáles son las formas de pago aceptadas?
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        function handleClick(opcion) {
            var conversacionElement = document.getElementById('conversacion');
            var mensajeElement = document.createElement('div');
            var mensajeText = '';

            if (opcion === 'horario') {
                mensajeText = 'Nuestro horario de atención es de lunes a viernes de 9:00 a.m. a 6:00 p.m.';
            } else if (opcion === 'descuento') {
                mensajeText = 'Tenemos varias promociones vigentes. ¿En qué producto estás interesado?';
            } else if (opcion === 'entrega') {
                mensajeText = 'El tiempo estimado de entrega depende de tu ubicación. Normalmente entregamos en un plazo de 3 a 5 días hábiles.';
            } else if (opcion === 'pago') {
                mensajeText = 'Aceptamos pagos en efectivo, tarjeta de crédito y transferencia bancaria.';
            }

            mensajeElement.innerHTML = '<div class="mensaje usuario"><p>' + opcion + '</p></div>';
            conversacionElement.appendChild(mensajeElement);

            setTimeout(function() {
                var respuestaElement = document.createElement('div');
                respuestaElement.innerHTML = '<div class="mensaje bot"><p>' + mensajeText + '</p></div>';
                conversacionElement.appendChild(respuestaElement);
            }, 1000);
        }
    </script>

    <?php include('../incluir/footer.php'); ?>
</body>

</html>
