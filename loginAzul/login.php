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
    <form action="./validar.php" method="post">
        <h1>Ingrese credencial</h1>
        <p>Usuario <input type="text" placeholder="Ingrese su nombre" name="usuario"></p>
        <p>Contraseña <input type="password" placeholder="Ingrese su contraseña" name="contrasenia"></p>
        <input type="submit" value="Ingresar">
    </form>
</body>

</html>