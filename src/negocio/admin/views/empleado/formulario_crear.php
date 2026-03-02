<h2 class="mb-4">Nuevo Empleado</h2>

<div class="form-section">
    <form action="empleado.php?accion=crear" method="POST" id="form-empleado">

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" required maxlength="50">
            </div>
            <div class="col-md-4 mb-3">
                <label for="primer_apellido" class="form-label">Primer Apellido</label>
                <input type="text" class="form-control" name="primer_apellido" id="primer_apellido" required maxlength="50">
            </div>
            <div class="col-md-4 mb-3">
                <label for="segundo_apellido" class="form-label">Segundo Apellido</label>
                <input type="text" class="form-control" name="segundo_apellido" id="segundo_apellido" required maxlength="50">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="rfc" class="form-label">RFC</label>
                <input type="text" class="form-control" name="rfc" id="rfc" required maxlength="13" placeholder="Ej. GASO800101AB1">
            </div>
            <div class="col-md-4 mb-3">
                <label for="curp" class="form-label">CURP</label>
                <input type="text" class="form-control" name="curp" id="curp" required maxlength="18" placeholder="Ej. GASO800101HJCRNM02">
            </div>
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen (URL o nombre de archivo)</label>
            <input type="text" class="form-control" name="imagen" id="imagen" required maxlength="255" placeholder="Ej. foto_empleado.jpg">
        </div>

        <div class="row">

            <!-- MUNICIPIO con búsqueda -->
            <div class="col-md-4 mb-3">
                <label for="municipio_buscar" class="form-label">Municipio</label>
                <input type="text"
                       class="form-control"
                       id="municipio_buscar"
                       list="lista_municipios"
                       autocomplete="off"
                       required
                       placeholder="Escribe para buscar...">
                <datalist id="lista_municipios">
                    <?php foreach ($municipios as $municipio): ?>
                        <option value="<?php echo htmlspecialchars($municipio['municipio'] . ' - ' . $municipio['estado']); ?>"></option>
                    <?php endforeach; ?>
                </datalist>
                <input type="hidden" name="id_municipio" id="id_municipio">
                <div class="invalid-feedback">Selecciona un municipio válido de la lista.</div>
            </div>

            <div class="col-md-4 mb-3">
                <label for="id_usuario" class="form-label">Usuario</label>
                <select class="form-select" name="id_usuario" id="id_usuario" required>
                    <option value="">-- Selecciona --</option>
                    <?php foreach ($usuarios as $usuario): ?>
                        <option value="<?php echo $usuario['id_usuario']; ?>">
                            <?php echo $usuario['correo']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="id_negocio" class="form-label">Negocio</label>
                <select class="form-select" name="id_negocio" id="id_negocio" required>
                    <option value="">-- Selecciona --</option>
                    <?php foreach ($negocios as $negocio): ?>
                        <option value="<?php echo $negocio['id_negocio']; ?>">
                            <?php echo $negocio['negocio']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="d-flex gap-2 mt-2">
            <input type="submit" class="btn btn-primary" name="empleado" value="Guardar">
            <a href="empleado.php" class="btn btn-secondary">Cancelar</a>
        </div>

    </form>
</div>

<script>
var municipioMap = {
    <?php foreach ($municipios as $municipio): ?>
    <?php echo json_encode($municipio['municipio'] . ' - ' . $municipio['estado']); ?>: <?php echo $municipio['id_municipio']; ?>,
    <?php endforeach; ?>
};

var inputBuscar = document.getElementById('municipio_buscar');
var inputId     = document.getElementById('id_municipio');

inputBuscar.addEventListener('change', function () {
    var id = municipioMap[this.value];
    if (id) {
        inputId.value = id;
        this.classList.remove('is-invalid');
        this.classList.add('is-valid');
    } else {
        inputId.value = '';
        this.classList.remove('is-valid');
        this.classList.add('is-invalid');
    }
});

document.getElementById('form-empleado').addEventListener('submit', function (e) {
    if (!inputId.value) {
        e.preventDefault();
        inputBuscar.classList.add('is-invalid');
        inputBuscar.focus();
    }
});
</script>
