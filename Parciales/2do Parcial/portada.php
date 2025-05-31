<?php
include "conexion.php";
$id = $_GET['id'];

$sql = "SELECT imagen, titulo FROM `libros` WHERE id=$id;";
$resultado = $con->query($sql);

$datos = [];
while ($portada = $resultado->fetch_assoc()) {
    $datos[] = $portada;
}
echo json_encode($datos, JSON_UNESCAPED_UNICODE);