<h2 class="mb-4">Nuevo Rol</h2>

<div class="form-section">
    <form action="rol.php?accion=crear" method="POST">

        <div class="mb-3">
            <label for="id_rol" class="form-label">ID del Rol</label>
            <input type="number" class="form-control" name="id_rol" id="id_rol" required
                   placeholder="Ej. 1">
            <small class="text-muted">El ID es definido manualmente (no se genera automáticamente).</small>
        </div>

        <div class="mb-3">
            <label for="rol" class="form-label">Nombre del Rol</label>
            <input type="text" class="form-control" name="rol" id="rol" required
                   maxlength="50" placeholder="Ej. Administrador">
        </div>

        <div class="d-flex gap-2">
            <input type="submit" class="btn btn-primary" name="enviar" value="Guardar">
            <a href="rol.php" class="btn btn-secondary">Cancelar</a>
        </div>

    </form>
</div>
