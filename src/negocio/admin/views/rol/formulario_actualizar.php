<h1>Actualizar Rol</h1>
<form action="rol.php?accion=actualizar&id=<?php echo $id; ?>" method="POST">
    <label for="">Nombre del rol</label>
    <input type="text" name="rol" value="<?php echo $data['rol']; ?>">
    <input type="submit" class="btn btn-primary" name="enviar" value="Guardar">
    <a href="rol.php" class="btn btn-secondary">Cancelar</a>
</form>