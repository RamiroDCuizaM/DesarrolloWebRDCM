<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["correo"])) {
   
    echo "Sesión no iniciada";
    die();
}
?>
