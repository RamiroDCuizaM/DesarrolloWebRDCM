<?php 
session_start();
require("verificarsesion.php");
include("conexion.php");

header('Content-Type: application/json');

try {
    // Parámetros
    $orden = $_GET['orden'] ?? 'personas.id';
    $buscar = $_GET['buscar'] ?? '';
    $pagina = intval($_GET['pagina'] ?? 1);
    $ascendente = $_GET['asendente'] ?? 'asc';

    // Validar orden
    $ordenesPermitidos = ['personas.id', 'nombres', 'apellidos', 'correo', 'fecha_nacimiento', 'profesiones.nombre'];
    if (!in_array($orden, $ordenesPermitidos)) {
        $orden = 'personas.id';
    }

    // Validar ascendente
    $ascendente = in_array(strtolower($ascendente), ['asc', 'desc']) ? $ascendente : 'asc';

    // Paginación
    $limit = 10;
    $offset = ($pagina - 1) * $limit;

    // Consulta principal con campos específicos
    $sql = "SELECT 
                personas.id, 
                personas.fotografia, 
                personas.nombres, 
                personas.apellidos, 
                personas.fecha_nacimiento, 
                personas.sexo, 
                personas.correo, 
                personas.profesion_id,
                profesiones.nombre as profesion_nombre
            FROM personas 
            LEFT JOIN profesiones ON personas.profesion_id = profesiones.id 
            WHERE personas.nombres LIKE ? 
               OR personas.apellidos LIKE ? 
               OR personas.correo LIKE ? 
               OR profesiones.nombre LIKE ?
            ORDER BY $orden $ascendente
            LIMIT $limit OFFSET $offset";

    $stmt = $con->prepare($sql);
    $searchTerm = "%$buscar%";
    $stmt->bind_param("ssss", $searchTerm, $searchTerm, $searchTerm, $searchTerm);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Obtener datos
    $personas = [];
    while($row = $resultado->fetch_assoc()) {
        $personas[] = $row;
    }

    // Total de registros para paginación
    $sqlCount = "SELECT COUNT(*) as total 
                 FROM personas 
                 LEFT JOIN profesiones ON personas.profesion_id = profesiones.id 
                 WHERE personas.nombres LIKE ? 
                    OR personas.apellidos LIKE ? 
                    OR personas.correo LIKE ? 
                    OR profesiones.nombre LIKE ?";
    
    $stmtCount = $con->prepare($sqlCount);
    $stmtCount->bind_param("ssss", $searchTerm, $searchTerm, $searchTerm, $searchTerm);
    $stmtCount->execute();
    $resultCount = $stmtCount->get_result();
    $total = $resultCount->fetch_assoc()['total'];
    $totalPaginas = ceil($total / $limit);

    // Respuesta exitosa
    echo json_encode([
        'success' => true,
        'datos' => $personas,
        'paginacion' => [
            'pagina' => $pagina,
            'totalPaginas' => $totalPaginas,
            'totalRegistros' => $total,
            'registrosPorPagina' => $limit
        ],
        'busqueda' => $buscar,
        'orden' => $orden,
        'ascendente' => $ascendente,
        'nivel_usuario' => $_SESSION['nivel'] ?? 0
    ]);

} catch(Exception $e) {
    // Respuesta de error
    echo json_encode([
        'success' => false,
        'error' => 'Error al cargar los datos: ' . $e->getMessage()
    ]);
}

$con->close();
?>