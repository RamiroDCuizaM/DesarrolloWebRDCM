<?php
include("conexion.php");

$sql = "SELECT titulo, imagen FROM libros";
$resultado = $con->query($sql);

$libros = array();
while ($row = mysqli_fetch_assoc($resultado)) {
    $libros[] = $row;
}

header('Content-Type: application/json');
echo json_encode($libros);
?>
