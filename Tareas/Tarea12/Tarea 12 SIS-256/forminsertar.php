<?php
session_start();
require("verificarsesion.php");
require("verificarnivel.php");
include("conexion.php");

$sql = "SELECT id, nombre FROM profesiones ORDER BY nombre";
$result = mysqli_query($con, $sql);
?>

<form id="form-crear" enctype="multipart/form-data" onsubmit="crearPersona(event)">
    <div class="form-group">
        <label for="fotografia">📷 Fotografía:</label>
        <input type="file" name="fotografia" id="fotografia" accept="image/*">
        <small>Formatos permitidos: JPG, JPEG, PNG, GIF (máximo 5MB)</small>
    </div>

    <div class="form-group">
        <label for="nombres">👤 Nombres: *</label>
        <input type="text" name="nombres" id="nombres" required maxlength="40">
    </div>

    <div class="form-group">
        <label for="apellidos">👥 Apellidos: *</label>
        <input type="text" name="apellidos" id="apellidos" required maxlength="50">
    </div>

    <div class="form-group">
        <label for="fecha_nacimiento">🎂 Fecha de Nacimiento: *</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required>
    </div>

    <div class="form-group">
        <label>⚥ Sexo: *</label>
        <div class="radio-group">
            <label><input type="radio" name="sexo" value="Masculino" required> Masculino</label>
            <label><input type="radio" name="sexo" value="Femenino" required> Femenino</label>
        </div>
    </div>

    <div class="form-group">
        <label for="correo">📧 Correo Electrónico: *</label>
        <input type="email" name="correo" id="correo" required maxlength="100">
    </div>

    <div class="form-group">
        <label for="profesion_id">💼 Profesión:</label>
        <select name="profesion_id" id="profesion_id">
            <option value="">Seleccione una profesión</option>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <option value="<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['nombre']); ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="form-buttons">
        <button type="submit" class="btn btn-primary">💾 Guardar</button>
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

.form-buttons {
    display: flex;
    gap: 10px;
    justify-content: flex-end;
    margin-top: 20px;
}

.btn {
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
}

.btn-primary {
    background-color: #007bff;
    color: white;
}

.btn-secondary {
    background-color: #6c757d;
    color: white;
}

small {
    color: #666;
    font-size: 12px;
}
</style>