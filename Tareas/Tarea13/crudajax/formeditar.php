<!-- Modal Editar -->
<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <?php
      include("conexion.php");
      $id = $_GET['id'];
      $sql = "SELECT id, nombres, apellidos, fecha_nacimiento, sexo, correo FROM personas WHERE id=$id";
      $resultado = $con->query($sql);
      $row = $resultado->fetch_assoc();
      ?>
      <form action="javascript:editar()" method="post" id="form-editar">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditarLabel">Editar Persona</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="nombres" class="form-label">Nombres</label>
            <input type="text" class="form-control" name="nombres" value="<?php echo $row['nombres']; ?>">
          </div>
          <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" name="apellidos" value="<?php echo $row['apellidos']; ?>">
          </div>
          <div class="mb-3">
            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" name="fecha_nacimiento" value="<?php echo $row['fecha_nacimiento']; ?>">
          </div>
          <div class="mb-3">
            <label class="form-label d-block">Sexo</label>
            <div class="form-check form-check-inline">
              <input type="radio" name="sexo" value="Masculino" class="form-check-input"
                <?php echo $row['sexo'] == 'Masculino' ? 'checked' : ''; ?>> Masculino
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" name="sexo" value="Femenino" class="form-check-input"
                <?php echo $row['sexo'] == 'Femenino' ? 'checked' : ''; ?>> Femenino
            </div>
          </div>
          <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" class="form-control" name="correo" value="<?php echo $row['correo']; ?>">
          </div>
          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Guardar</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>
