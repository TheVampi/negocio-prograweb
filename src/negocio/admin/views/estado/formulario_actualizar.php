<h1>Actualizar Estado</h1>
<form action="estado.php?accion=actualizar&id=<?php echo $id; ?>" method="POST">
    <label for="">Nombre del estado</label>
    <input type="text" name="estado" value="<?php echo $data['estado']; ?>">
    <input type="submit" class="btn btn-primary" name="enviar" value="Guardar">
    <a href="estado.php" class="btn btn-secondary">Cancelar</a>
</form>