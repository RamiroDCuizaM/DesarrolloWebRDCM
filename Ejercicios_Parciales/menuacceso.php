<?php
include('examen.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opcion = $_POST["opcion"];
    $n = $_POST["n"];
    $cadena = $_POST["cadena"];
    $a = $_POST["a"];
    $b = $_POST["b"];
    $c = $_POST["c"];
}

    $examen = new examen($n, $cadena, $a, $b, $c);

    switch ($opcion) {
        case "fibonacci":
            $examen->calcularFibonacci();
            break;
        case "mayor":
            $examen->calcularMayor();
            break;
        case "piramide":
            $examen->piramide();
            break;
        default:
            echo "Opción inválida.";
    }
?>