<h2 class="mb-4">Actualizar Rol</h2>

<div class="form-section">
    <form action="rol.php?accion=actualizar&id=<?php echo $id; ?>" method="POST">

        <div class="mb-3">
            <label for="rol" class="form-label">Nombre del Rol</label>
            <input type="text" class="form-control" name="rol" id="rol" required
                   maxlength="50" value="<?php echo $data['rol']; ?>">
        </div>

        <div class="d-flex gap-2">
            <input type="submit" class="btn btn-primary" name="enviar" value="Actualizar">
            <a href="rol.php" class="btn btn-secondary">Cancelar</a>
        </div>

    </form>
</div>
