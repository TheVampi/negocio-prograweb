<?php
$municipio_actual_texto = '';
foreach ($municipios as $municipio) {
    if ($municipio['id_municipio'] == $data['id_municipio']) {
        $municipio_actual_texto = $municipio['municipio'];
        break;
    }
}
?>

<h2 class="mb-4">Actualizar Negocio</h2>

<div class="form-section">
    <form action="negocio.php?accion=actualizar&id=<?php echo $id; ?>" method="POST" id="form-negocio">

        <div class="mb-3">
            <label for="negocio" class="form-label">Nombre del Negocio</label>
            <input type="text" class="form-control" name="negocio" id="negocio" required maxlength="100"
                   value="<?php echo htmlspecialchars($data['negocio']); ?>">
        </div>

        <div class="mb-3">
            <label for="municipio_buscar" class="form-label">Municipio</label>
            <input type="text"
                   class="form-control"
                   id="municipio_buscar"
                   list="lista_municipios"
                   autocomplete="off"
                   required
                   placeholder="Escribe el nombre del municipio..."
                   value="<?php echo htmlspecialchars($municipio_actual_texto); ?>">
            <datalist id="lista_municipios">
                <?php foreach ($municipios as $municipio): ?>
                    <option value="<?php echo htmlspecialchars($municipio['municipio']); ?>"></option>
                <?php endforeach; ?>
            </datalist>
            <input type="hidden" name="id_municipio" id="id_municipio"
                   value="<?php echo $data['id_municipio']; ?>">
            <div class="form-text">Selecciona uno de la lista desplegable para confirmar.</div>
            <div class="invalid-feedback">Selecciona un municipio válido de la lista.</div>
        </div>

        <div class="d-flex gap-2 mt-2">
            <input type="submit" class="btn btn-primary" name="enviar" value="Actualizar">
            <a href="negocio.php" class="btn btn-secondary">Cancelar</a>
        </div>

    </form>
</div>

<script>
var municipioMap = <?php
$map = [];
foreach ($municipios as $municipio) {
    $map[$municipio['municipio']] = (int)$municipio['id_municipio'];
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

document.getElementById('form-negocio').addEventListener('submit', function (e) {
    if (!inputId.value) {
        e.preventDefault();
        inputBuscar.classList.add('is-invalid');
        inputBuscar.focus();
    }
});
</script>
