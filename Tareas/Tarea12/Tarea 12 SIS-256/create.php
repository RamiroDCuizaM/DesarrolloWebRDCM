<?php
session_start();
require("verificarsesion.php");
require("verificarnivel.php");
include("conexion.php");

header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

try {
    // Validar datos requeridos
    $nombres = trim($_POST['nombres'] ?? '');
    $apellidos = trim($_POST['apellidos'] ?? '');
    $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? '';
    $sexo = $_POST['sexo'] ?? '';
    $correo = trim($_POST['correo'] ?? '');
    $profesion_id = intval($_POST['profesion_id'] ?? 0);

    // Validaciones básicas
    if (empty($nombres) || empty($apellidos) || empty($fecha_nacimiento) || empty($sexo) || empty($correo)) {
        throw new Exception('Todos los campos son obligatorios');
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('El formato del correo electrónico no es válido');
    }

    // Verificar si el correo ya existe
    $stmtCheck = $con->prepare("SELECT id FROM personas WHERE correo = ?");
    $stmtCheck->bind_param("s", $correo);
    $stmtCheck->execute();
    if ($stmtCheck->get_result()->num_rows > 0) {
        throw new Exception('Ya existe una persona con este correo electrónico');
    }

    // Procesar imagen si se subió
    $fotografia = '';
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
            $fotografia = $nombreArchivo;
        } else {
            throw new Exception('Error al subir la imagen');
        }
    }

    // Insertar en base de datos
    $stmt = $con->prepare("INSERT INTO personas (fotografia, nombres, apellidos, fecha_nacimiento, sexo, correo, profesion_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssi", $fotografia, $nombres, $apellidos, $fecha_nacimiento, $sexo, $correo, $profesion_id);

    if ($stmt->execute()) {
        $response = [
            'success' => true,
            'message' => 'Persona creada exitosamente',
            'id' => $con->insert_id
        ];
    } else {
        throw new Exception('Error al guardar en la base de datos: ' . $stmt->error);
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