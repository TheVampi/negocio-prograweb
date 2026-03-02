<h1>Actualizar Municipio</h1>
<form action="municipio.php?accion=actualizar&id=<?php echo $id; ?>" method="POST">
    <div class="form-group">
        <label for="municipio">Nombre del municipio</label>
        <input type="text" class="form-control" name="municipio" id="municipio" 
               value="<?php echo $data['municipio']; ?>" required>
    </div>
    
    <div class="form-group">
        <label for="id_estado">Selecciona el estado</label>
        <select class="form-control" name="id_estado" id="id_estado" required>
            <option value="">-- Selecciona un estado --</option>
            <?php foreach ($estados as $estado): ?>
                <option value="<?php echo $estado['id_estado']; ?>" 
                    <?php echo ($estado['id_estado'] == $data['id_estado']) ? 'selected' : ''; ?>>
                    <?php echo $estado['estado']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>


    <br>
    <input type="submit" class="btn btn-primary" name="enviar" value="Actualizar">
    <a href="municipio.php" class="btn btn-secondary">Cancelar</a>
</form>