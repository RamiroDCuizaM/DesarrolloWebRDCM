<?php
session_start();
if (!isset($_SESSION['numero'])) {
    $n = intval($_GET['n']);
    $_SESSION['numero'] = $n;
}

function sumatoria($n) {
    $suma = 0;
    for($i = 1;$i<=$n;$i++){
        $suma = $suma+$i;
    }
    return $suma;
}

// Función para calcular el factorial
function factorial($n) {
    $facto = 1;
    for($i = 1;$i<=$n;$i++){
        $facto = $facto*$i;
    }
    return $facto;
}

// Función para generar la serie de Fibonacci hasta el enésimo término
function fibonacci($n) {
    $serie = [0, 1];
    for ($i = 2; $i < $n; $i++) {
        $serie[] = $serie[$i - 1] + $serie[$i - 2];
    }
    return implode(", ", array_slice($serie, 0, $n));
}

// Función para dividir el número entre 2
function dividir($n) {
    return $n / 2;
}

// Obtener la opción seleccionada
$resultado = "";
if (isset($_GET['operacion'])) {
    switch ($_GET['operacion']) {
        case 'sumatoria':
            $resultado = "La sumatoria de ". $_SESSION['numero']." es: " . sumatoria($_SESSION['numero']);
            break;
        case 'factorial':
            $resultado = "El factorial de ".$_SESSION['numero'] ." es: " . factorial($_SESSION['numero']);
            break;
        case 'fibonacci':
            $resultado = "La secuencia de Fibonacci hasta ".$_SESSION['numero'] ." términos es: " . fibonacci($_SESSION['numero']);
            break;
        case 'dividir':
            $resultado = "La división de ".$_SESSION['numero'] ." entre 2 es: " . dividir($_SESSION['numero']);
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Menu de operaciones</h2>
    <label for="op">Selecione la operacion a Realizar:</label>
    <button><a href="menuOperaciones.php?operacion=sumatoria">Sumatoria</a></button>
    <button><a href="menuOperaciones.php?operacion=factorial">Factorial</a></button>
    <button><a href="menuOperaciones.php?operacion=fibonacci">Fibonacci</a></button>
    <button><a href="menuOperaciones.php?operacion=dividir">Dividir entre 2</a></button>

    <p>Resultado: <?php echo $resultado;?></p>
    <a href="cerrar.php">Cerrar Sesion</a>

</body>
</html>