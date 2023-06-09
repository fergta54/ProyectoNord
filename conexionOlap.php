<?php

// $servidor = 'localhost';
// $usu = 'root';
// $password = '';
// $bd = 'nordsternazul';
// ---------------------------------------
// $servidor = 'MYSQL8001.site4now.net';
// $usu = 'a9a738_nrdazul';
// $password = 'GrupoAzul777';
// $bd = 'db_a9a738_nrdazul';



// $conexion = mysqli_connect('localhost', 'root', '', 'nordsternazul');


// PARA OLAP
$servidor = 'MYSQL5048.site4now.net';
$usu = 'a9a9dc_olap';
$password = 'GrupoAzul777';
$bd = 'db_a9a9dc_olap';

$conexionolap = mysqli_connect($servidor, $usu, $password, $bd);