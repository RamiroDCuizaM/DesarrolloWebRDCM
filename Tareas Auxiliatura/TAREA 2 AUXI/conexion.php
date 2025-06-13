<?php
$con = new mysqli("localhost", "root", "", "bd_biblioteca");

if ($con->connect_error) {
    die("Conexión fallida: " . $con->connect_error);
}

// Establecer el conjunto de caracteres
$con->set_charset("utf8mb4");
?>