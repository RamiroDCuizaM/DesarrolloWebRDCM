<?php
    $cantidad = intval($_POST["cantidad"]);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Ingrese las palabras</h2>
    <form action="ordenar.php" method="post">
        <?php
        for ($i = 1; $i <= $cantidad; $i++) {
            echo "<label for='palabra$i'>Palabra $i:</label>";
            echo "<input type='text' name='palabras[]' id='palabra$i'><br><br>";
        }
        ?>
        <button type="submit">Ordenar Palabras</button>
    </form>
</body>
</html>
