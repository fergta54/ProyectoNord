<?php
// seguridad de sesiones paginacion
//session_start();

include("../conexion.php");
$query=mysqli_query($conexion, "SELECT * FROM usuarios INNER JOIN rol on usuarios.id_rol = rol.id_rol where nombre_usuario='".$_SESSION['usuario']."' ");
while ($row=mysqli_fetch_array($query)) {
    $role = $row['nombre_rol'];
}

$varSession = null;
$varRol = null;
if (isset($_SESSION['usuario'])) {
    $varSession = $_SESSION['usuario'];
    $varRol = $role;
}
if ($varSession == null || $varSession = '' || $varRol != 'Administrador') {
    echo"<script type='text/javascript'>
    
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No tiene acceso a esta página',
        });
        window.location.href = '../loginAzul/login.php';
        </script>";
    //header("Location:../loginAzul/login.php");
    die();
}

// if ($varRol != 'Administrador') {
//     echo"<script type='text/javascript'>
    
//         Swal.fire({
//             icon: 'error',
//             title: 'Error',
//             text: 'No tiene acceso a esta página',
//         });
//         window.location.href = '../loginAzul/login.php';
//         </script>";
//     //header("Location:../loginAzul/login.php");
//     die();
// }

?>