<h1>Actualizar Estado</h1>
<form action="empleado.php?accion=actualizar&id=<?php echo $id; ?>" method="POST">
    <label for="">Nombre del empleado</label>
    <input type="text" name="nombre_empleado" value="<?php echo $data['nombre']; ?>">
    <input type="submit" class="btn btn-primary" name="enviar" value="Guardar">
    <a href="estado.php" class="btn btn-secondary">Cancelar</a>
</form>