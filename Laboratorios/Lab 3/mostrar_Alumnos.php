<?php 
include 'conexion.php';

$sql = "SELECT a.fotografia, a.nombres, a.apellidos, a.cu, a.sexo, c.carrera 
        FROM alumnos a 
        JOIN carreras c ON a.codigocarrera = c.codigo";
$resultado = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Alumnos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<table class="tablaM">
    <tr class="encabezado">
        <th>Nro</th>
        <th>Fotografía</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>CU</th>
        <th>Sexo</th>
        <th>Carrera</th>
    </tr>

    <?php 
    $nro = 1;
    while ($fila = $resultado->fetch_assoc()) { 
    ?>
    <tr>
        <td><?php echo $nro++; ?></td>
        <td><img src="images/<?php echo $fila['fotografia']; ?>" alt="Foto" class="imgM"></td>
        <td><?php echo $fila['nombres']; ?></td>
        <td><?php echo $fila['apellidos']; ?></td>
        <td><?php echo $fila['cu']; ?></td>
        <td><?php echo $fila['sexo'] == 'M' ? 'Masculino' : 'Femenino'; ?></td>
        <td><?php echo $fila['carrera']; ?></td>
    </tr>
    <?php } ?>

</table>

</body>
</html>
