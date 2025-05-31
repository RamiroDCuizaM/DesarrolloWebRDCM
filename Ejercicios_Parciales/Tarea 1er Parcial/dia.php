<!DOCTYPE html>
<html>
<head>
  <title>Día seleccionado</title>
</head>
<body>

<?php
// Verificamos si se recibió el valor "n" por GET
if (isset($_GET['n'])) {
    $n = intval($_GET['n']); // Convertimos a entero por seguridad
    $dias = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"];

    if ($n >= 1 && $n <= 7) {
        echo "<h2>Día seleccionado: {$dias[$n - 1]}</h2>";
        echo "<label for='dia'>Día de la semana:</label>";
        echo "<select id='dia' name='dia'>";
        for ($i = 0; $i < 7; $i++) {
            $selected = ($i + 1 == $n) ? "selected" : "";
            echo "<option value='" . ($i + 1) . "' $selected>" . $dias[$i] . "</option>";
        }
        echo "</select>";
    } else {
        echo "<p style='color: red;'>Número fuera de rango. Ingresa un número del 1 al 7.</p>";
    }
} else {
    echo "<p>No se recibió ningún número.</p>";
}
?>

</body>
</html>