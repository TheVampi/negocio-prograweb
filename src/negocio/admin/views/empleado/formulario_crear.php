<h1>Nuevo Empleado</h1>
<form action="empleado.php?accion=crear" method="POST">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombre" id="nombre" required>
    </div>
    <div class="mb-3">
        <label for="primer_apellido" class="form-label">Primer apellido</label>
        <input type="text" class="form-control" name="primer_apellido" id="primer_apellido" required>
    </div>
    <div class="mb-3">
        <label for="segundo_apellido" class="form-label">Segundo apellido</label>
        <input type="text" class="form-control" name="segundo_apellido" id="segundo_apellido">
    </div>
    <div class="mb-3">
        <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
        <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" required>
    </div>
    <div class="mb-3">
        <label for="rfc" class="form-label">RFC</label>
        <input type="text" class="form-control" name="rfc" id="rfc" maxlength="13" required>
    </div>
    <div class="mb-3">
        <label for="curp" class="form-label">CURP</label>
        <input type="text" class="form-control" name="curp" id="curp" maxlength="18" required>
    </div>
    <div class="mb-3">
        <label for="imagen" class="form-label">URL de imagen</label>
        <input type="text" class="form-control" name="imagen" id="imagen">
    </div>
    <div class="mb-3">
        <label for="id_municipio" class="form-label">Municipio</label>
        <select class="form-select" name="id_municipio" id="id_municipio" required>
            <option value="">-- Selecciona un municipio --</option>
            <?php foreach ($municipios as $municipio): ?>
                <option value="<?php echo $municipio['id_municipio']; ?>">
                    <?php echo $municipio['municipio']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="id_usuario" class="form-label">Usuario</label>
        <select class="form-select" name="id_usuario" id="id_usuario" required>
            <option value="">-- Selecciona un usuario --</option>
            <?php foreach ($usuarios as $usuario): ?>
                <option value="<?php echo $usuario['id_usuario']; ?>">
                    <?php echo $usuario['correo']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="id_negocio" class="form-label">Negocio</label>
        <select class="form-select" name="id_negocio" id="id_negocio" required>
            <option value="">-- Selecciona un negocio --</option>
            <?php foreach ($negocios as $negocio): ?>
                <option value="<?php echo $negocio['id_negocio']; ?>">
                    <?php echo $negocio['negocio']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <input type="submit" class="btn btn-primary" name="enviar" value="Guardar">
    <a href="empleado.php" class="btn btn-secondary">Cancelar</a>
</form>