<?php
include("grafica.php");
session_start();
    $item = $_POST["item"];
    $color = $_POST["color"];
    $color_fondo = $_POST["color_fondo"];
    $imagen = $_POST["imagen"];
    $metodo = $_POST["metodo"];



if (!isset($_SESSION['grafica'])) {
    $_SESSION['grafica'] = new grafica($item, $color, $color_fondo, $imagen);    
}


    $obj = $_SESSION['grafica'];
    if ($metodo == "cuadrado") {
        $obj->Cuadrado();
    } elseif ($metodo == "diagonal") {
        $obj->Diagonal();
    }
?>

<a href="CerrarGrafica.php">Cerrar</a>
