<?php
include("grafica.php");
session_start();

$item = $_POST["item"];
$color = $_POST["color"];
$color_fondo = $_POST["color_fondo"];
$metodo = $_POST["metodo"];

$nombreImagen = "";
$rutaCompleta = "";

if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    $directorio = "img/";
    $nombreImagen = basename($_FILES["imagen"]["name"]);
    $rutaCompleta = $directorio . $nombreImagen;

    if (!move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaCompleta)) {
        echo "Error al subir la imagen.";
    }
}

if (!isset($_SESSION['grafica'])) {
    $_SESSION['grafica'] = new grafica($item, $color, $color_fondo, $rutaCompleta);
}

$obj = $_SESSION['grafica'];
if ($metodo == "cuadrado") {
    $obj->Cuadrado();
} elseif ($metodo == "diagonal") {
    $obj->Diagonal();
}
?>

<a href="CerrarGrafica.php">Cerrar</a>
