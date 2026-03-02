<h1>Nuevo Municipio</h1>
<form action="municipio.php?accion=crear" method="POST">
    <label for="municipio">Nombre del municipio</label>
    <input type="text" class="form-control" name="municipio" id="municipio" required>

    <label for="id_estado">Selecciona el estado</label>
    <select name="id_estado" id="id_estado" required>
        <?php foreach ($estados as $estado): ?>
            <option value="<?php echo $estado['id_estado']; ?>">
                <?php echo $estado['estado']; ?>
            </option>
        <?php endforeach; ?>
    </select>
    
    <br>
    <input type="submit" class="btn btn-primary" name="enviar" value="Guardar">
    <a href="municipio.php" class="btn btn-secondary">Cancelar</a>
</form>