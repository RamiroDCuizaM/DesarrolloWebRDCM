<?php
$n = $_GET['n'];
$digito = $n;
$suma = 0;
while($n>0){
    $digito = $n % 10;
    $suma = $suma + $digito;
    $n = intval($n/10);
}
echo "La suma de los digitos es: ".$suma;
?>