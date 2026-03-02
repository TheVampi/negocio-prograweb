<h2 class="mb-4">Actualizar Estado</h2>

<div class="form-section">
    <form action="estado.php?accion=actualizar&id=<?php echo $id; ?>" method="POST">

        <div class="mb-3">
            <label for="estado" class="form-label">Nombre del Estado</label>
            <input type="text" class="form-control" name="estado" id="estado" required
                   maxlength="30" value="<?php echo $data['estado']; ?>">
        </div>

        <div class="d-flex gap-2">
            <input type="submit" class="btn btn-primary" name="enviar" value="Actualizar">
            <a href="estado.php" class="btn btn-secondary">Cancelar</a>
        </div>

    </form>
</div>
