<?php
session_start();
session_unset();
echo"<script type='text/javascript'>
        window.location = './login.php';
    </script>";
?>