<?php 
session_start();
require("verificarsesion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión - Agenda 2025</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <ul class="menu">
            <li><a href="#" onclick="listar()">🏠 Inicio</a></li>
            <li><a href="#" onclick="listar()">👥 Agenda</a></li>
            <li><a href="#" onclick="cargarProfesiones()">💼 Profesiones</a></li>
            <li><a href="cerrar.php">🚪 Salir</a></li>
        </ul>
        
        <div id="contenido">
            <div class="loading" id="loading" style="display: none;">
                <p>Cargando...</p>
            </div>
        </div>
    </div>

    <!-- Modal Universal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="titulo-modal">Título del Modal</h2>
            <div id="contenido-modal"></div>
        </div>
    </div>

    <!-- Modal de Confirmación -->
    <div id="confirmModal" class="modal">
        <div class="modal-content confirm-modal">
            <h3>¿Está seguro?</h3>
            <p id="confirm-message">¿Desea continuar con esta acción?</p>
            <div class="confirm-buttons">
                <button id="confirm-yes" class="btn btn-danger">Sí, Eliminar</button>
                <button id="confirm-no" class="btn btn-secondary">Cancelar</button>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>