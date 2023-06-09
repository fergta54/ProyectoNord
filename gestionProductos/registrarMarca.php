<?php
include("../conexion.php");
session_start();
$registros = mysqli_query($conexion, "insert into marcas(nombre_marca,descripcion_marca,estado_marca) values ('$_REQUEST[nombreMarca]','$_REQUEST[descripcionMarca]',1)")
    or die("Problemas al registrar la marca" . mysqli_error($conexion));

// $ultimoId = mysqli_insert_id($conexion);
// $a = mysqli_query($conexion, "CALL SP_CargarAsientos22('$ultimoId')");
// $a = mysqli_query($conexion, "CALL SP_RegistrarPrecios('$ultimoId','$_REQUEST[precioEjecutivo]','$_REQUEST[precioComercial]')");

mysqli_close($conexion);


echo "<script type='text/javascript'>alert('Marca registrada con éxito');
        window.location = './listarMarcas.php';
        </script>";
