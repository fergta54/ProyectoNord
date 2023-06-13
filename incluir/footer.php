<!DOCTYPE html>
<html>
<head>
  <title>Título de la página</title>
  <style>
    body {
      margin: 0;
      padding-bottom: 70px; /* valor según el tamaño del footer */
    }

    .footer {
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
      height: 70px; /* valor según la altura del footer */
      background-color: #333;
      color: #888;
      text-align: center;
    }

    .footer p {
      line-height: 70px; /* valor según la altura del footer */
      margin: 0;
    }
  </style>
</head>
<body>
  <!-- Contenido de la página -->
  
  <div class="footer">
  <p>&copy; <?php echo date("Y"); ?> Nordstern. Todos los derechos reservados.</p>
  </div>
</body>
</html>
