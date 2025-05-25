<?php
include("conexion.php");

$sql = "SELECT id, nombres, apellidos, fecha_nacimiento, sexo, correo FROM personas";
$resultado = $con->query($sql);

if ($resultado->num_rows > 0) {
    echo '<table class="table table-striped">';
    echo '<thead><tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Fecha Nac.</th>
            <th>Sexo</th>
            <th>Correo</th>
            <th>Acciones</th>
          </tr></thead><tbody>';
    while ($row = $resultado->fetch_assoc()) {
        echo '<tr>
                <td>' . $row['id'] . '</td>
                <td>' . htmlspecialchars($row['nombres']) . '</td>
                <td>' . htmlspecialchars($row['apellidos']) . '</td>
                <td>' . $row['fecha_nacimiento'] . '</td>
                <td>' . $row['sexo'] . '</td>
                <td>' . htmlspecialchars($row['correo']) . '</td>
                <td>
                    <button onclick="formEditar(' . $row['id'] . ')" class="btn btn-primary btn-sm">Editar</button>
                    <button onclick="eliminar(' . $row['id'] . ')" class="btn btn-danger btn-sm">Eliminar</button>
                </td>
              </tr>';
    }
    echo '</tbody></table>';
} else {
    echo "<p>No hay registros.</p>";
}

$con->close();
?>
