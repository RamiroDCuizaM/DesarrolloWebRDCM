<?php
include("conexion.php");

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);

    $sql = "DELETE FROM personas WHERE id = ?";
    $stmt = $con->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo "Registro eliminado correctamente.";
        } else {
            echo "Error al eliminar el registro.";
        }
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta.";
    }
} else {
    echo "ID no proporcionado.";
}

$con->close();
?>
