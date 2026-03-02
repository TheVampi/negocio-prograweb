<h2 class="mb-4">Nuevo Estado</h2>

<div class="form-section">
    <form action="estado.php?accion=crear" method="POST">

        <div class="mb-3">
            <label for="id_estado" class="form-label">ID del Estado</label>
            <input type="number" class="form-control" name="id_estado" id="id_estado" required
                   placeholder="Ej. 14">
            <small class="text-muted">El ID es definido manualmente (no se genera automáticamente).</small>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Nombre del Estado</label>
            <input type="text" class="form-control" name="estado" id="estado" required
                   maxlength="30" placeholder="Ej. Jalisco">
        </div>

        <div class="d-flex gap-2">
            <input type="submit" class="btn btn-primary" name="enviar" value="Guardar">
            <a href="estado.php" class="btn btn-secondary">Cancelar</a>
        </div>

    </form>
</div>
