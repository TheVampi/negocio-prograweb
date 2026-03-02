<h1>Actualizar Negocio</h1>
<form action="negocio.php?accion=actualizar&id=<?php echo $id; ?>" method="POST">
    <div class="mb-3">
        <label for="negocio" class="form-label">Nombre del negocio</label>
        <input type="text" class="form-control" name="negocio" id="negocio"
               value="<?php echo $data['negocio']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control" name="descripcion" id="descripcion" rows="3"><?php echo $data['descripcion']; ?></textarea>
    </div>
    <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="text" class="form-control" name="telefono" id="telefono"
               value="<?php echo $data['telefono']; ?>">
    </div>
    <div class="mb-3">
        <label for="correo" class="form-label">Correo electrónico</label>
        <input type="email" class="form-control" name="correo" id="correo"
               value="<?php echo $data['correo']; ?>">
    </div>
    <div class="mb-3">
        <label for="direccion" class="form-label">Dirección</label>
        <input type="text" class="form-control" name="direccion" id="direccion"
               value="<?php echo $data['direccion']; ?>">
    </div>
    <input type="submit" class="btn btn-primary" name="enviar" value="Actualizar">
    <a href="negocio.php" class="btn btn-secondary">Cancelar</a>
</form>
