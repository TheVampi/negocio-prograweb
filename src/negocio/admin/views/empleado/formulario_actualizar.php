<h2 class="mb-4">Actualizar Empleado</h2>

<?php
// Buscar el nombre visible del municipio actual para pre-llenar el input
$municipio_actual_texto = '';
foreach ($municipios as $municipio) {
    if ($municipio['id_municipio'] == $data['id_municipio']) {
        $municipio_actual_texto = $municipio['municipio'] . ' - ' . $municipio['estado'];
        break;
    }
}
?>

<div class="form-section">
    <form action="empleado.php?accion=actualizar&id=<?php echo $id; ?>" method="POST" id="form-empleado">

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" required maxlength="50"
                       value="<?php echo htmlspecialchars($data['nombre']); ?>">
            </div>
            <div class="col-md-4 mb-3">
                <label for="primer_apellido" class="form-label">Primer Apellido</label>
                <input type="text" class="form-control" name="primer_apellido" id="primer_apellido" required maxlength="50"
                       value="<?php echo htmlspecialchars($data['primer_apellido']); ?>">
            </div>
            <div class="col-md-4 mb-3">
                <label for="segundo_apellido" class="form-label">Segundo Apellido</label>
                <input type="text" class="form-control" name="segundo_apellido" id="segundo_apellido" required maxlength="50"
                       value="<?php echo htmlspecialchars($data['segundo_apellido']); ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" required
                       value="<?php echo $data['fecha_nacimiento']; ?>">
            </div>
            <div class="col-md-4 mb-3">
                <label for="rfc" class="form-label">RFC</label>
                <input type="text" class="form-control" name="rfc" id="rfc" required maxlength="13"
                       value="<?php echo htmlspecialchars($data['rfc']); ?>">
            </div>
            <div class="col-md-4 mb-3">
                <label for="curp" class="form-label">CURP</label>
                <input type="text" class="form-control" name="curp" id="curp" required maxlength="18"
                       value="<?php echo htmlspecialchars($data['curp']); ?>">
            </div>
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen (URL o nombre de archivo)</label>
            <input type="text" class="form-control" name="imagen" id="imagen" required maxlength="255"
                   value="<?php echo htmlspecialchars($data['imagen']); ?>">
        </div>

        <div class="row">

            <!-- MUNICIPIO con búsqueda, pre-llenado con el valor actual -->
            <div class="col-md-4 mb-3">
                <label for="municipio_buscar" class="form-label">Municipio</label>
                <input type="text"
                       class="form-control"
                       id="municipio_buscar"
                       list="lista_municipios"
                       autocomplete="off"
                       required
                       placeholder="Escribe para buscar..."
                       value="<?php echo htmlspecialchars($municipio_actual_texto); ?>">
                <datalist id="lista_municipios">
                    <?php foreach ($municipios as $municipio): ?>
                        <option value="<?php echo htmlspecialchars($municipio['municipio'] . ' - ' . $municipio['estado']); ?>"></option>
                    <?php endforeach; ?>
                </datalist>
                <input type="hidden" name="id_municipio" id="id_municipio"
                       value="<?php echo $data['id_municipio']; ?>">
                <div class="invalid-feedback">Selecciona un municipio válido de la lista.</div>
            </div>

            <div class="col-md-4 mb-3">
                <label for="id_usuario" class="form-label">Usuario</label>
                <select class="form-select" name="id_usuario" id="id_usuario" required>
                    <option value="">-- Selecciona --</option>
                    <?php foreach ($usuarios as $usuario): ?>
                        <option value="<?php echo $usuario['id_usuario']; ?>"
                            <?php echo ($usuario['id_usuario'] == $data['id_usuario']) ? 'selected' : ''; ?>>
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
                        <option value="<?php echo $negocio['id_negocio']; ?>"
                            <?php echo ($negocio['id_negocio'] == $data['id_negocio']) ? 'selected' : ''; ?>>
                            <?php echo $negocio['negocio']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="d-flex gap-2 mt-2">
            <input type="submit" class="btn btn-primary" name="empleado" value="Actualizar">
            <a href="empleado.php" class="btn btn-secondary">Cancelar</a>
        </div>

    </form>
</div>

<script>
var municipioMap = <?php
$map = [];
foreach ($municipios as $municipio) {
    $key = $municipio['municipio'] . ' - ' . $municipio['estado'];
    $map[$key] = (int)$municipio['id_municipio'];
}
echo json_encode($map);
?>;

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
