<?php
function ordenarPalabras($palabras) {
    sort($palabras);
    return $palabras;
}

    $palabras = $_POST['palabras'];
    $palabrasOrdenadas = ordenarPalabras($palabras);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .contenedor {
            margin: 20px auto;
            text-align: center;
        }
        .lista {
            margin: 0 auto;
            width: 100px;
            border: 3px solid red;
            background-color: yellow;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <h2>Palabras Ordenadas</h2>
        <ol class="lista">
            <?php
            foreach ($palabrasOrdenadas as $lista) {
                echo "<li>" . $lista . "</li>";
            }
            ?>
        </ol>
    </div>
    <br>
    <a href="form.html">Volver al inicio</a>
</body>
</html>
