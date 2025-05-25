<?php
session_start();
require("verificarsesion.php");
require("verificarnivel.php");
include("conexion.php");

header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

try {
    // Validar datos requeridos
    $id = intval($_POST['id'] ?? 0);
    $nombres = trim($_POST['nombres'] ?? '');
    $apellidos = trim($_POST['apellidos'] ?? '');
    $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? '';
    $sexo = $_POST['sexo'] ?? '';
    $correo = trim($_POST['correo'] ?? '');
    $profesion_id = intval($_POST['profesion_id'] ?? 0);

    if ($id <= 0) {
        throw new Exception('ID de persona no válido');
    }

    // Validaciones básicas
    if (empty($nombres) || empty($apellidos) || empty($fecha_nacimiento) || empty($sexo) || empty($correo)) {
        throw new Exception('Todos los campos son obligatorios');
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('El formato del correo electrónico no es válido');
    }

    // Verificar si el correo ya existe en otro registro
    $stmtCheck = $con->prepare("SELECT id FROM personas WHERE correo = ? AND id != ?");
    $stmtCheck->bind_param("si", $correo, $id);
    $stmtCheck->execute();
    if ($stmtCheck->get_result()->num_rows > 0) {
        throw new Exception('Ya existe otra persona con este correo electrónico');
    }

    // Verificar que el registro existe
    $stmtExists = $con->prepare("SELECT fotografia FROM personas WHERE id = ?");
    $stmtExists->bind_param("i", $id);
    $stmtExists->execute();
    $result = $stmtExists->get_result();
    if ($result->num_rows === 0) {
        throw new Exception('La persona que intenta editar no existe');
    }
    $datosActuales = $result->fetch_assoc();

    // Procesar imagen si se subió una nueva
    $fotografia = $datosActuales['fotografia']; // Mantener la imagen actual por defecto
    
    if (isset($_FILES['fotografia']) && $_FILES['fotografia']['error'] === UPLOAD_ERR_OK) {
        $archivoTmp = $_FILES['fotografia']['tmp_name'];
        $nombreOriginal = $_FILES['fotografia']['name'];
        $extension = strtolower(pathinfo($nombreOriginal, PATHINFO_EXTENSION));
        
        // Validar tipo de archivo
        $tiposPermitidos = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($extension, $tiposPermitidos)) {
            throw new Exception('Solo se permiten archivos JPG, JPEG, PNG o GIF');
        }

        // Validar tamaño (máximo 5MB)
        if ($_FILES['fotografia']['size'] > 5 * 1024 * 1024) {
            throw new Exception('El archivo de imagen es demasiado grande (máximo 5MB)');
        }

        // Generar nombre único
        $nombreArchivo = uniqid() . '.' . $extension;
        $rutaDestino = "images/" . $nombreArchivo;

        // Crear directorio si no existe
        if (!file_exists("images/")) {
            mkdir("images/", 0777, true);
        }

        // Mover archivo
        if (move_uploaded_file($archivoTmp, $rutaDestino)) {
            // Eliminar imagen anterior si existe y no está vacía
            if (!empty($fotografia) && file_exists("images/" . $fotografia)) {
                unlink("images/" . $fotografia);
            }
            $fotografia = $nombreArchivo;
        } else {
            throw new Exception('Error al subir la nueva imagen');
        }
    }

    // Actualizar en base de datos
    $stmt = $con->prepare("UPDATE personas SET fotografia=?, nombres=?, apellidos=?, fecha_nacimiento=?, sexo=?, correo=?, profesion_id=? WHERE id=?");
    $stmt->bind_param("ssssssii", $fotografia, $nombres, $apellidos, $fecha_nacimiento, $sexo, $correo, $profesion_id, $id);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            $response = [
                'success' => true,
                'message' => 'Persona actualizada exitosamente'
            ];
        } else {
            $response = [
                'success' => true,
                'message' => 'No se realizaron cambios (los datos son idénticos)'
            ];
        }
    } else {
        throw new Exception('Error al actualizar en la base de datos: ' . $stmt->error);
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