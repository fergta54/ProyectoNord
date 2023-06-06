<?php
$myPhpVar = $_POST['variable'];
    
        // $myPhpVar= $_COOKIE['myJavascriptVar'];     
        include("./conexion.php");
        $registro = mysqli_query($conexion, "insert into zpruebaimagenes(cadenaImg) values ('$myPhpVar')")
            or die("Problemas al registrar la marca" . mysqli_error($conexion));
        mysqli_close($conexion);
        header("location:./mostrarimg.php");
