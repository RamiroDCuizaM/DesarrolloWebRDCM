<?php
include ('conexion.php');
$correo = $_POST['correo'];
$contra = sha1($_POST['password']);

$stmt=$con->prepare('SELECT correo,nombre,nivel FROM usuarios WHERE id');

// Vincular parámetros
$stmt->bind_param("sssss",$nombres, $apellidos,$fecha_nacimiento,$sexo,$correo);
?>