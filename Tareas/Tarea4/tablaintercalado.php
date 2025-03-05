<link rel="stylesheet" href="style.css">
<?php

$filas = $_POST['filas'];
$columnas = $_POST['columnas'];

echo "<table>";
    for ($i = 0; $i < $filas; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $columnas; $j++) {
            $numero = $i + 1; 
            if($numero % 3 == 1)
                $contador = 1;
            if($numero % 3 == 2)
            $contador = 2;
            if($numero % 3 == 0)
            $contador = 3;
        
            if($numero % 3 == 1)
                $clase = 'rojo';
            if($numero % 3 == 2)
              $clase = 'amarillo';
            if($numero % 3 == 0)
               $clase = 'verde';

            $contenido = ($j == 0) ? (($numero % 3 == 1) ? "Viva" : (($numero % 3 == 2) ? "Mi" : "Bolivia")) : $contador;
            echo "<td class='$clase'>$contenido</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
?>

    