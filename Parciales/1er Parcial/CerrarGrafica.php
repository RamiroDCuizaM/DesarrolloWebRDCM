<?php session_start();
echo "El itenm ".$_SESSION['grafica']. " se cerro";
session_destroy();
?>
<meta http-equiv="refresh" content="3;url=inicio.php">