<?php session_start();
echo "el valor de le contador es ".$_SESSION['numero'];
session_destroy();
?>
<meta http-equiv="refresh" content="3;url=pregunta2.html">