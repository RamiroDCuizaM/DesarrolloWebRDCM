<?php
include('pila.php');
session_start();

if (isset($_SESSION['p'])) {
    echo "El elemento eliminado es: " . $_SESSION['p']->eliminar();
} else {
    echo "No hay elementos en la pila.";
}
?>
<meta http-equiv="refresh" content="3; url=menupila.html">
