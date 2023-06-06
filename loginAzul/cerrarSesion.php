<?php
session_start();
session_destroy();
session_start();
$_SESSION['usuario'] = null;
header("location:../index.php");
