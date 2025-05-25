<?php
session_start();
require("verificarsesion.php");
require("verificarnivel.php");
include("conexion.php");

$id = intval($_GET['id'] ?? 0);

if ($id <= 0) {
    echo "<p>Error: ID no válido</p>";
    exit;
}

// Obtener datos de la persona
$sql = "SELECT id, fotografia, nombres, apellidos, fecha_nacimiento, sexo, correo, profesion_id FROM personas WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 0) {
    echo "<p>Error: Persona no encontrada</p>";
    exit;
}

$persona = $resultado->fetch_assoc();

// Obtener profesiones
$sqlProfesiones = "SELECT id, nombre FROM profesiones ORDER BY nombre";
$resultProfesiones = mysqli_query($con, $sqlProfesiones);
?>

<form id="form-edit" enctype="multipart/form-data" onsubmit="guardarEditar(event)">
    <input type="hidden" name="id" value="<?php echo $persona['id']; ?>">
    
    <div class="form-group">
        <label>📷 Fotografía Actual:</label>
        <?php if (!empty($persona["fotografia"]) && file_exists("images/" . $persona["fotografia"])) { ?>
            <div class="current-image">
                <img src="images/<?php echo htmlspecialchars($persona["fotografia"]); ?>" alt="Foto actual" style="max-width: 150px; max-height: 150px; border-radius: 8px;">
            </div>
        <?php } else { ?>
            <div class="no-image">
                <p>Sin fotografía</p>
            </div>
        <?php } ?>
        
        <label for="fotografia">📷 Nueva Fotografía (opcional):</label>
        <input type="file" name="fotografia" id="fotografia" accept="image/*">
        <small>Formatos permitidos: JPG, JPEG, PNG, GIF (máximo 5MB). Deje vacío para mantener la imagen actual.</small>
    </div>

    <div class="form-group">
        <label for="nombres">👤 Nombres: *</label>
        <input type="text" name="nombres" id="nombres" value="<?php echo htmlspecialchars($persona['nombres']); ?>" required maxlength="40">
    </div>

    <div class="form-group">
        <label for="apellidos">👥 Apellidos: *</label>
        <input type="text" name="apellidos" id="apellidos" value="<?php echo htmlspecialchars($persona['apellidos']); ?>" required maxlength="50">
    </div>

    <div class="form-group">
        <label for="fecha_nacimiento">🎂 Fecha de Nacimiento: *</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $persona['fecha_nacimiento']; ?>" required>
    </div>

    <div class="form-group">
        <label>⚥ Sexo: *</label>
        <div class="radio-group">
            <label><input type="radio" name="sexo" value="Masculino" <?php echo $persona['sexo'] == 'Masculino' ? 'checked' : ''; ?> required> Masculino</label>
            <label><input type="radio" name="sexo" value="Femenino" <?php echo $persona['sexo'] == 'Femenino' ? 'checked' : ''; ?> required> Femenino</label>
        </div>
    </div>

    <div class="form-group">
        <label for="correo">📧 Correo Electrónico: *</label>
        <input type="email" name="correo" id="correo" value="<?php echo htmlspecialchars($persona['correo']); ?>" required maxlength="100">
    </div>

    <div class="form-group">
        <label for="profesion_id">💼 Profesión:</label>
        <select name="profesion_id" id="profesion_id">
            <option value="">Seleccione una profesión</option>
            <?php while ($prof = mysqli_fetch_assoc($resultProfesiones)) { ?>
                <option value="<?php echo $prof['id']; ?>" <?php echo $persona['profesion_id'] == $prof['id'] ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($prof['nombre']); ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <div class="form-buttons">
        <button type="submit" class="btn btn-primary">💾 Actualizar</button>
        <button type="button" class="btn btn-secondary" onclick="cerrarModal()">❌ Cancelar</button>
    </div>
</form>

<style>
.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.form-group input,
.form-group select {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
}

.radio-group {
    display: flex;
    gap: 15px;
}

.radio-group label {
    display: flex;
    align-items: center;
    font-weight: normal;
}

.radio-group input {
    width: auto;
    margin-right: 5px;
}

.current-image {
    margin-bottom: 10px;
    text-align: center;
}

.no-image {
    background: #f8f9fa;
    padding: 20px;
    text-align: center;
    border-radius: 8px;
    margin-bottom: 10px;
    color: #6c757d;
}

.form-buttons {
    display: flex;
    gap: 10px;
    justify-content: flex-end;
    margin-top: 20px;
}