<?php
$temperatura = $_POST["temp"];
$unidad = $_POST["grado"];
if ($unidad == "celsius") {
    $fahrenheit = ($temperatura * 9/5) + 32;
    $kelvin = $temperatura + 273.15;
    $resultados = ["Celsius (°C)",$temperatura,"Fahrenheit (°F)",$fahrenheit,"Kelvin (K)", $kelvin];
} 
if ($unidad == "fahrenheit") {
    $celsius = ($temperatura - 32) * 5/9;
    $kelvin = $celsius + 273.15;
    $resultados = ["Fahrenheit (°F)", $temperatura,"Celsius (°C)", $celsius,"Kelvin (K)", $kelvin];
} 
if ($unidad == "kelvin") {
    $celsius = $temperatura - 273.15;
    $fahrenheit = ($celsius * 9/5) + 32;
    $resultados = ["Kelvin (K)", $temperatura,"Celsius (°C)", $celsius,"Fahrenheit (°F)", $fahrenheit];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse:collapse;
            border: 3px solid green;
            background-color: white;
            width: 400px;
            margin-top: 20px;
            text-align: center;
        }
        th {
            color: white;
            background-color: green;
            padding: 10px;
        } 
        
        td {
            padding: 10px;
        }
    </style>
</head>
<body>
    <h2>Resultados de la Conversión</h2>
    <table>
        <tr>
            <th>Unidad</th>
            <th>Temperatura</th>
        </tr>
        <?php
        for ($i = 0; $i < count($resultados); $i=$i+2) {
            echo "<tr>";
                echo "<td>" . $resultados[$i] . "</td>";
                echo "<td>" . $resultados[$i+1] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
    <a href="formTemp.html">Realizar otra conversión</a>
</body>
</html>
