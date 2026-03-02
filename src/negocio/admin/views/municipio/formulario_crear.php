<h2 class="mb-4">Nuevo Municipio</h2>

<div class="form-section">
    <form action="municipio.php?accion=crear" method="POST">

        <div class="mb-3">
            <label for="municipio" class="form-label">Nombre del Municipio</label>
            <input type="text" class="form-control" name="municipio" id="municipio" required
                   maxlength="100" placeholder="Ej. Guadalajara">
        </div>

        <div class="mb-3">
            <label for="id_estado" class="form-label">Estado</label>
            <select class="form-select" name="id_estado" id="id_estado" required>
                <option value="">-- Selecciona un estado --</option>
                <?php foreach ($estados as $estado): ?>
                    <option value="<?php echo $estado['id_estado']; ?>">
                        <?php echo $estado['estado']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="d-flex gap-2">
            <input type="submit" class="btn btn-primary" name="enviar" value="Guardar">
            <a href="municipio.php" class="btn btn-secondary">Cancelar</a>
        </div>

    </form>
</div>
