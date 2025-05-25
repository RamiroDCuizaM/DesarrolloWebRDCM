<?php
session_start();
require("verificarsesion.php");
require("verificarnivel.php");
include("conexion.php");

header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

try {
    $id = intval($_GET['id'] ?? 0);

    if ($id <= 0) {
        throw new Exception('ID de persona no válido');
    }

    // Verificar que el registro existe y obtener la imagen
    $stmtCheck = $con->prepare("SELECT fotografia FROM personas WHERE id = ?");
    $stmtCheck->bind_param("i", $id);
    $stmtCheck->execute();
    $result = $stmtCheck->get_result();
    
    if ($result->num_rows === 0) {
        throw new Exception('La persona que intenta eliminar no existe');
    }

    $datosPersona = $result->fetch_assoc();
    $fotografia = $datosPersona['fotografia'];

    // Eliminar de la base de datos
    $stmt = $con->prepare("DELETE FROM personas WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            // Eliminar imagen si existe
            if (!empty($fotografia) && file_exists("images/" . $fotografia)) {
                unlink("images/" . $fotografia);
            }

            $response = [
                'success' => true,
                'message' => 'Persona eliminada exitosamente'
            ];
        } else {
            throw new Exception('No se pudo eliminar la persona (posiblemente ya fue eliminada)');
        }
    } else {
        throw new Exception('Error al eliminar de la base de datos: ' . $stmt->error);
    }

} catch(Exception $e) {
    $response = [
        'success' => false,
        'message' => $e->getMessage()
    ];
}

echo json_encode($response);
$con->close();
?>