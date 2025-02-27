<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mayor de 3 numeros</title>
</head>
<body>
    <?php
    $a = $_GET['a'];
    $b = $_GET['b'];
    $c = $_GET['c'];
     if($a>$b && $a>$c){
        echo "El mayor es $a";
     }
     if($b>$a && $b>$c){
        echo "El mayor es $b";
     }
     if($c>$a && $c>$b){
        echo "El mayor es $c";
     }
    ?>
</body>
</html>