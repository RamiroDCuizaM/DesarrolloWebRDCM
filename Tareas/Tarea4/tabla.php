<link rel="stylesheet" href="style.css">

    <?php
        $filas = $_POST['filas'];
        $columnas = $_POST['columnas'];

        echo "<table>";
        
        for ($i = 0; $i <= $filas; $i++) {
            echo "<tr>";
            for ($j = 0; $j <= $columnas; $j++) {
                if ($i == 0 && $j == 0) {
                    echo "<th class='superior'></th>";  
                } elseif ($i == 0) {
                    echo "<th class='superior'>$j</th>"; 
                } elseif ($j == 0) {
                    echo "<th class='lateral'>$i</th>"; 
                } else {
                    echo "<td class='multiplicacion'>" . ($i * $j) . "</td>"; 
                }
            }
            echo "</tr>";
        }

        echo "</table>";
    ?>
    

