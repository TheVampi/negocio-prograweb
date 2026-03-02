<h1>Nuevo Negocio</h1>
<form action="negocio.php?accion=crear" method="POST">
    <div class="mb-3">
        <label for="negocio" class="form-label">Nombre del negocio</label>
        <input type="text" class="form-control" name="negocio" id="negocio" required>
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="text" class="form-control" name="telefono" id="telefono">
    </div>
    <div class="mb-3">
        <label for="correo" class="form-label">Correo electrónico</label>
        <input type="email" class="form-control" name="correo" id="correo">
    </div>
    <div class="mb-3">
        <label for="direccion" class="form-label">Dirección</label>
        <input type="text" class="form-control" name="direccion" id="direccion">
    </div>
    <input type="submit" class="btn btn-primary" name="enviar" value="Guardar">
    <a href="negocio.php" class="btn btn-secondary">Cancelar</a>
</form>
