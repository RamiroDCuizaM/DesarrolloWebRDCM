<?php 
include("pila.php");
session_start();

if (!isset($_SESSION['p'])) {
    $_SESSION['p'] = new Pila();    
}


if (!empty($_GET['elemento'])) {
    $_SESSION['p']->insertar($_GET['elemento']);
}

?>
<meta http-equiv="refresh" content="3; url=menupila.html">
