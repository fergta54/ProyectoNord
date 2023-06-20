<!DOCTYPE html>
<html>
<head>
  <title>Título de la página</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

  <style>
    body {
      margin: 0;
      padding-bottom: 70px; /* valor según el tamaño del footer */
    }

    .footer {
      left: 0;
      bottom: 0;
      width: 100%;
      height: 130px; /* valor según la altura del footer */
      line-height: 70px;
      background-color: #333;
      color: #888;
      text-align: center;
      text-transform: uppercase;
    }

    .footer p {
      line-height: 30px; /* valor según la altura del footer */
      margin: 0;
    }

    .footer ul {
      list-style-type: none; /* Eliminar viñetas de la lista */
      margin: 0;
      padding: 0;
    }

    .footer ul li {
      display: inline-block; /* Mostrar elementos en línea */
      margin-right: 10px; /* Espaciado entre elementos */
    }

    .footer ul li a {
      color: white; /* Color del texto del enlace */
      text-decoration: none; /* Eliminar subrayado del enlace */
    }

    .footer ul li a:hover {
      color: royalblue;
      text-decoration: none;
    }    

</style>
 
</head>
<body>
  <!-- Contenido de la página -->

  <div class="footer">
  
  <ul>
    <li><a href="./sobreNosotros.php">Sobre Nosotros</a></li>
    <li><a href="./contactanos.php">Contacto</a></li>
    <li><a href="./sucursales.php">Sucursales</a></li>
    <li><a href="./servicios.php">Servicios</a></li>
  </ul><p>&copy; <?php echo date("Y"); ?> Nordstern. Todos los derechos reservados.</p>
</div>
</body>
</html>
